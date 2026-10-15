<?php require_once dirname(__DIR__) . '/includes/header.php'; ?>

    <?php

        if(isset($_GET['idProduto'])){
            $idProduto = $_GET['idProduto'];

            //Inclui o arquivo de conexão com o Banco de Dados
            require_once dirname(__DIR__) . '/config/database.php';

            $exibirProduto = "SELECT * FROM Produtos WHERE idProduto = $idProduto";
            $res           = mysqli_query($conn, $exibirProduto); //Executa o comando
            $totalProdutos = mysqli_num_rows($res); //Retorna a quantidade de registros

            if($totalProdutos > 0){

                if($registro = mysqli_fetch_assoc($res)){
                    $idProduto             = $registro["idProduto"];
                    $fotoProduto           = $registro["fotoProduto"];
                    $nomeProduto           = $registro["nomeProduto"];
                    $descricaoProduto      = $registro["descricaoProduto"];
                    $valorProduto          = $registro["valorProduto"];
                    $estoque               = $registro["estoque"];

    ?>
            <section class="py-5">
            <div class="container px-4 px-lg-5 my-1">
                <div class="row gx-4 gx-lg-5 align-items-center bg-light py-3">
                    <div class="col-md-5"><img class="card-img-top" src="<?= product_image_url($fotoProduto) ?>" alt="<?= htmlspecialchars($nomeProduto) ?>" /></div>
                    <div class="col-md-6">
                        <div class="mb-1">Unidades disponíveis:
                            <?php
                            if($estoque == '0'){
                                echo "Esgotado";
                            }
                            else{
                                echo $estoque;
                            }

                    ?>
                    </div>
                        <h1 class="display-5 fw-bolder"><?php echo $nomeProduto ?> <?php echo "Vol.";?></h1>
                        <div class="fs-5 mb-5">
                            <span> R$<?php echo $valorProduto?></span>
                        </div>
                        <p class="lead" style="text-align: justify;"> <?php echo $descricaoProduto?>
        <?php

            //Verifica se há uma sessão iniciada
            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                if($_SESSION['tipoUsuario'] == 'cliente'){
                    if($estoque > '0'){
                        echo "<form class='d-flex' action='" . app_url('actions/comprar.php') . "' method='POST'>
                                <input class='form-control text-center me-3' id='quantidade' type='number' value='1' style='max-width: 3rem' name='quantidade' min='1' max='$estoque'>
                                <label for='quantidade'></label>
                                <button class='btn btn-outline-dark flex-shrink-0' type='submit'>
                                    Comprar
                                </button>
                                <input type='hidden' name='idProduto' value='$idProduto'>
                                <input type='hidden' name='fotoProduto' value='$fotoProduto'>
                                <input type='hidden' name='nomeProduto' value='$nomeProduto'>
                                <input type='hidden' name='valorProduto' value='$valorProduto'>
                            </form>";
                    }
                    else{
                        echo "
                            <div class='alert alert-secondary'>
                                Produto esgotado! <i class='bi bi-emoji-frown'></i>
                            </div>
                        ";
                    }
                }
                else{
                    echo "
                        <form action='" . app_url("pages/admin/editar-produto.php?idProduto=$idProduto") . "' method='POST'>
                            <input type='hidden' name='idProduto' value='$idProduto'>
                            <button type='submit' class='btn btn-outline-primary'>
                                <i class='bi bi-pencil-square'></i>
                                Editar Produto
                            </button>
                        </form>
                    ";
                }
            }
            else{
                echo "
                    <div class='btn btn-outline-orange'>
                        <a href='" . app_url('pages/login.php') . "' class='nav-link'>
                            Acesse o sistema para poder comprar este Produto!
                            <i class='bi bi-person'></i>
                        </a>
                    </div>
                ";
            }
            }
            else{
                echo ("<div class='alert alert-danger text-center'>Produto não localizado!</div>");
            }
                echo "</div>";
            }
        }
        else{
            echo ("<div class='alert alert-danger text-center'>Não foi possível carregar o Produto!</div>");
        }

        ?>

                </div>
            </div>
        </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
