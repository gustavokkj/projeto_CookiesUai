<?php require_once dirname(__DIR__) . '/includes/header.php'; ?>

<div class="container text-center mb-3 mt-3 ">

    <h2 style="margin-top: 150px;">Cadastro de Usuário:</h2>
    <div class="d-flex justify-content-center mb-3 ">
        <div class="row">
            <div class="col-12">
                <form action="<?= app_url('actions/cadastrar-usuario.php') ?>" method="POST" class="was-validated">

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeUsuario" placeholder="Nome" name="nomeUsuario" required>
                        <label for="nomeUsuario">Nome Completo</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="telefoneUsuario" placeholder="Telefone" name="telefoneUsuario" required>
                        <label for="telefoneUsuario">Telefone</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="emailUsuario" placeholder="Email" name="emailUsuario" required>
                        <label for="emailUsuario">Email</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaUsuario" placeholder="Senha" name="senhaUsuario" required>
                        <label for="senhaUsuario">Senha</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="confirmarSenhaUsuario" placeholder="Confirme a Senha" name="confirmarSenhaUsuario" required>
                        <label for="confirmarSenhaUsuario">Confirme a Senha</label>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
        <br>
    </div>

</div>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
