<?php require_once dirname(__DIR__, 2) . '/includes/auth.php'; ?>
<?php require_once dirname(__DIR__, 2) . '/includes/header.php'; ?>

<div class="container text-center mb-3 mt-3">

    <?php
        if(isset($_GET['idProduto'])){
            $idProduto = $_GET['idProduto'];

            $idUsuario = $_SESSION['idUsuario'];

            require_once dirname(__DIR__, 2) . '/config/database.php';
            $buscarProduto = "SELECT * FROM Produtos WHERE idProduto = $idProduto";
            $res = mysqli_query($conn, $buscarProduto); //Executa a query
            $totalProdutos = mysqli_num_rows($res);

            if($totalProdutos > 0){
                if($registro = mysqli_fetch_assoc($res)){
                    $idProduto        = $registro['idProduto'];
                    $fotoProduto      = $registro['fotoProduto'];
                    $nomeProduto      = $registro['nomeProduto'];
                    $descricaoProduto = $registro['descricaoProduto'];
                    $valorProduto     = $registro['valorProduto'];
                    $estoque          = $registro['estoque'];
                }
            }
            else{
                echo "<div class='alert alert-danger text-center'>Não foi possível carregar o Produto</div>";
            }

        }
        else{
            echo "<div class='alert alert-danger text-center'>Não foi possível carregar o Produto</div>";
        }
    ?>

    <h2>Editar Produto:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="<?= app_url('actions/editar-produto.php') ?>" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="idProduto" name="idProduto" value="<?php echo $idProduto ?>" required readonly>
                        <label for="idProduto">ID</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <img src="<?= product_image_url($fotoProduto) ?>" style="width: 100px;" title="Foto atual de <?= htmlspecialchars($nomeProduto) ?>">
                        <input type="hidden" id="fotoAtual" name="fotoAtual" value="<?php echo $fotoProduto ?>" required> <!-- Passa o local da FOTO ATUAL como parâmetro oculto com um NAME diferente -->
                        <input type="file" class="btn btn-link" name="fotoProduto"> <!-- Oferece a opção para alterar foto -->
                        <label for="fotoProduto"></label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeProduto" placeholder="Nome" name="nomeProduto" value="<?php echo $nomeProduto ?>"required>
                        <label for="nomeProduto">Nome do Produto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="descricaoProduto" placeholder="Informe uma breve descrição sobre o Produto" name="descricaoProduto"required><?php echo $descricaoProduto ?></textarea>
                        <label for="descricaoProduto">Descrição do Produto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="valorProduto" placeholder="Valor do Produto" name="valorProduto" value="<?php echo $valorProduto ?>"required>
                        <label for="valorProduto">Valor do Produto (R$):</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                        <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="estoque" placeholder="Estoque" name="estoque" value="<?php echo $estoque ?>"required>
                        <label for="valorProduto">Estoque:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                </form>

                <form method="POST" action="<?= app_url('actions/remover-produto.php') ?>">
                <input type='hidden' name='idProduto' value='<?php echo $idProduto; ?>'>
                    <button type="submit" class="btn btn-alert">Remover Item</button>
                </form>

            </div>
        </div>
    </div>
    <br>

</div>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>
