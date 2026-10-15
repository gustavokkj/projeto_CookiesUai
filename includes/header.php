<?php

require_once dirname(__DIR__) . '/config/app.php';

date_default_timezone_set('America/Sao_Paulo');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$tipoUsuario = $_SESSION['tipoUsuario'] ?? null;
$primeiroNome = '';

if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    $nomeUsuario = (string) ($_SESSION['nomeUsuario'] ?? '');
    $nomeCompleto = explode(' ', trim($nomeUsuario));
    $primeiroNome = $nomeCompleto[0] ?? '';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Loja virtual acadêmica Cookies Uai">
    <title>Cookies Uai</title>
    <link rel="icon" type="image/x-icon" href="<?= app_url('assets/favicon.ico') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= app_url('assets/css/styles.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function () {
            $('#telefoneUsuario').mask('(00) 00000-0000');
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background:#d89150">
        <div class="container px-4 px-lg-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Abrir navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active text-light" href="<?= app_url() ?>">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="<?= app_url('pages/produtos.php') ?>">Todos os Produtos</a></li>
                    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
                        <li class="nav-item"><a class="nav-link text-light" href="<?= app_url('actions/logout.php') ?>">Sair</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-light" href="<?= app_url('pages/login.php') ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <?php if ($tipoUsuario === 'adm'): ?>
                <a class="nav-link active text-light" href="<?= app_url('pages/admin/cadastrar-produto.php') ?>">Cadastrar Produto</a>
            <?php elseif ($tipoUsuario === 'cliente'): ?>
                <button class="btn btn-outline-light" type="button">
                    <i class="bi-cart-fill me-1"></i>
                    Carrinho
                    <span class="badge bg-cookie text-white ms-1 rounded-pill">0</span>
                </button>
            <?php endif; ?>
        </div>
    </nav>
