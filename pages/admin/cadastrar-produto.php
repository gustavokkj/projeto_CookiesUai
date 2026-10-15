<?php require_once dirname(__DIR__, 2) . '/includes/auth.php'; ?>
<?php require_once dirname(__DIR__, 2) . '/includes/header.php'; ?>

<div class="container text-center mb-1 mt-6">
    
    <h2>Cadastrar Produto:</h2>
    <div class="d-flex justify-content-center mb-3 ">
        <div class="row">
            <div class="col-12">
                <form action="<?= app_url('actions/cadastrar-produto.php') ?>" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotoProduto" name="fotoProduto" required>
                        <label for="fotoProduto">Foto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeProduto" placeholder="Nome" name="nomeProduto" required>
                        <label for="nomeProduto">Nome do Produto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="descricaoProduto" placeholder="Informe uma breve descrição sobre o Produto" name="descricaoProduto" required></textarea>
                        <label for="descricaoProduto">Descrição do Produto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="valorProduto" placeholder="Valor do Produto" name="valorProduto" required>
                        <label for="valorProduto">Valor do Produto (R$):</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="estoque" placeholder="Nome" name="estoque" required>
                        <label for="estoque">Estoque:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <button type="submit" class="btn btn-outline-cookie">Cadastrar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <br>

</div>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>
