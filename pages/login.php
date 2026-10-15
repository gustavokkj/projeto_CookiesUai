<?php require_once dirname(__DIR__) . '/includes/header.php'; ?>

<div class="container text-center mb-3 mt-3"
     style="min-height: 80vh; display: flex; justify-content: center; align-items: center;">

    <?php
        //Verifica se há algum parâmetro chamado 'erroLogin' sendo recebido por GET
        if(isset($_GET['erroLogin'])){
            $erroLogin = $_GET['erroLogin']; //Variável PHP recebe o parâmetro GET

            if($erroLogin == 'dadosInvalidos'){
                echo "<div class='alert alert-warning text-center'><strong>USUÁRIO ou SENHA</strong> inválidos!</div>";
            }
            if($erroLogin == 'naoLogado'){
                echo "<div class='alert alert-warning text-center'><strong>USUÁRIO</strong> não logado!</div>";
            }
        }
    ?>
<div>
    <h2>Iniciar sessão:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="<?= app_url('actions/login.php') ?>" method="POST" class="was-validated">
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="emailUsuario" placeholder="Email" name="emailUsuario" required>
                        <label for="emailUsuario">Email</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaUsuario" placeholder="Senha" name="senhaUsuario" required>
                        <label for="senhaUsuario">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-outline-cookie"><i class="bi bi-person"></i> Login</button>
                </form>
            </div>
        </div>
    </div>

    <br>

    <p class="mb-5">
        Ainda não possui cadastro? <a href="<?= app_url('pages/cadastro.php') ?>" title="Cadastrar-se">Clique aqui!</a>

    </p>
</div>
</div>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
