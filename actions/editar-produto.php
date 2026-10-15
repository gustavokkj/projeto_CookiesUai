<?php

require_once dirname(__DIR__) . '/includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to('pages/admin/cadastrar-produto.php');
}

$idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_VALIDATE_INT);
$nomeProduto = trim((string) ($_POST['nomeProduto'] ?? ''));
$descricaoProduto = trim((string) ($_POST['descricaoProduto'] ?? ''));
$valorInformado = str_replace(',', '.', trim((string) ($_POST['valorProduto'] ?? '')));
$estoqueInformado = trim((string) ($_POST['estoque'] ?? ''));
$fotoProduto = (string) ($_POST['fotoAtual'] ?? '');
$erros = [];

if ($idProduto === false || $idProduto === null) {
    $erros[] = 'O produto informado é inválido.';
}

if ($nomeProduto === '') {
    $erros[] = 'O nome do produto é obrigatório.';
}

if ($descricaoProduto === '') {
    $erros[] = 'A descrição do produto é obrigatória.';
}

$valorProduto = filter_var($valorInformado, FILTER_VALIDATE_FLOAT);
if ($valorProduto === false || $valorProduto < 0) {
    $erros[] = 'O valor do produto deve ser um número maior ou igual a zero.';
}

$estoque = filter_var($estoqueInformado, FILTER_VALIDATE_INT);
if ($estoque === false || $estoque < 0) {
    $erros[] = 'O estoque deve ser um número inteiro maior ou igual a zero.';
}

$upload = $_FILES['fotoProduto'] ?? null;
if ($upload !== null && $upload['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($upload['error'] !== UPLOAD_ERR_OK) {
        $erros[] = 'Não foi possível receber a nova foto.';
    } elseif ($upload['size'] > 5_000_000) {
        $erros[] = 'A foto não deve possuir mais do que 5 MB.';
    } else {
        $nomeArquivo = basename((string) $upload['name']);
        $nomeArquivo = preg_replace('/[^a-zA-Z0-9._-]/', '-', $nomeArquivo);
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];

        if ($nomeArquivo === '' || !in_array($extensao, $extensoesPermitidas, true)) {
            $erros[] = 'A foto deve estar no formato JPG, JPEG, PNG ou WEBP.';
        } else {
            $destino = APP_ROOT . '/assets/images/products/' . $nomeArquivo;

            if (!move_uploaded_file($upload['tmp_name'], $destino)) {
                $erros[] = 'Não foi possível salvar a nova foto.';
            } else {
                $fotoProduto = 'assets/images/products/' . $nomeArquivo;
            }
        }
    }
}

$produtoAtualizado = false;

if ($erros === []) {
    require_once dirname(__DIR__) . '/config/database.php';

    $sql = 'UPDATE Produtos
            SET fotoProduto = ?, nomeProduto = ?, descricaoProduto = ?, valorProduto = ?, estoque = ?
            WHERE idProduto = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sssdii',
        $fotoProduto,
        $nomeProduto,
        $descricaoProduto,
        $valorProduto,
        $estoque,
        $idProduto
    );
    $produtoAtualizado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if (!$produtoAtualizado) {
        $erros[] = 'Não foi possível atualizar o produto.';
    }
}

require_once dirname(__DIR__) . '/includes/header.php';
?>

<main class="container my-3">
    <?php if ($produtoAtualizado): ?>
        <div class="alert alert-success text-center">Produto alterado com sucesso!</div>
        <div class="text-center">
            <img src="<?= product_image_url($fotoProduto) ?>" width="150" alt="<?= htmlspecialchars($nomeProduto) ?>">
            <h2 class="h4 mt-3"><?= htmlspecialchars($nomeProduto) ?></h2>
            <p><?= nl2br(htmlspecialchars($descricaoProduto)) ?></p>
            <p>R$ <?= number_format((float) $valorProduto, 2, ',', '.') ?> — Estoque: <?= (int) $estoque ?></p>
            <a class="btn btn-outline-primary" href="<?= app_url("pages/produto.php?idProduto={$idProduto}") ?>">Ver produto</a>
        </div>
    <?php else: ?>
        <?php foreach ($erros as $erro): ?>
            <div class="alert alert-warning text-center"><?= htmlspecialchars($erro) ?></div>
        <?php endforeach; ?>
        <div class="text-center">
            <a class="btn btn-outline-secondary" href="<?= app_url("pages/admin/editar-produto.php?idProduto={$idProduto}") ?>">Voltar para edição</a>
        </div>
    <?php endif; ?>
</main>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
