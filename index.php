<?php require_once __DIR__ . '/includes/header.php'; ?>
<!-- Header-->
        <header class="py-4" style="background:#ffddba; color:#412714">
            <div class="container px-4 px-lg-5 d-flex flex-column flex-md-row align-items-center justify-content-center gap-4">
                <img src="<?= app_url('assets/images/brand/cookie-illustration.png') ?>" alt="Cookie com gotas de chocolate em desenho" width="240" height="240" class="img-fluid" style="object-fit:contain">
                <div class="text-center text-md-start">
                    <h1 class="display-3 fw-bold">Web Store</h1>
                    <p class="lead mb-0">Uma pequena loja de cookies.</p>
                </div>
            </div>
        </header>

        <?php
        require_once __DIR__ . '/config/database.php';

                $productImagesBase = app_url('assets/images/products');
                $productPageUrl = app_url('pages/produto.php');

                $listarProdutos = 'SELECT * FROM Produtos';

                if(isset($_GET["filtroProduto"])){
                    $filtroProduto = $_GET["filtroProduto"];
                    $listarProdutos = $listarProdutos . " WHERE disponivel = '1' ";
                }

                $res = mysqli_query($conn, $listarProdutos); //Executa a query
                $totalProdutos = mysqli_num_rows($res); //Retorna a quantidade de registros

                echo"<section class='py-5'>
                            <body class='d-flex flex-column min-vh-100'>
                            <div class='container px-4 px-lg-5 mt-5'>
                                <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/tradicional.jpg' alt='Cookie tradicional' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie de Tradicional</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$8,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=1'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>

                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/chocolate.jpg' alt='Cookie de chocolate' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie de Chocolate</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$8,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=7'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/redvelvet.jpg' alt='Cookie red velvet' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie Red Velvet</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$9,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=8'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/kitkat.jpg' alt='Cookie de Kit Kat' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie de KitKat</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$12,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=9'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/nutella.jpg' alt='Cookie de chocolate com Nutella' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie de Chocolate c/ Nutella</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$13,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=13'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/mm.jpg' alt='Cookie de M&amp;Ms' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie de M&Ms</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$10,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=14'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/amendoim.jpg' alt='Cookie de amendoim' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Cookie de Amendoim</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$9,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=15'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col mb-5'>
                                        <div class='card h-100'>
                                            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Novidade   </div>
                                        <!--Imagem do Produto-->
                                            <!--Imagem do Produto-->
                                            <img class='card-img-top' src='$productImagesBase/bnutella.jpg' alt='Brownie com Nutella' />
                                            <!--Detalhe do Produto-->
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <!--Nome do Produto-->
                                                    <h5 class='fw-bolder'>Brownie de Nutella</h5>

                                                    <!--Avaliação do Produto
                                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                        <div class='bi-star-fill'></div>
                                                    </div>-->

                                                    <!--Preço do Produto-->
                                                    <!--usado pra traçar para desconto<span class='text-muted text-decoration-line-through'>$20.00</span>-->
                                                    R$16,00
                                                </div>
                                            </div>
                                            <!--Ação do Produto-->
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='$productPageUrl?idProduto=16'>Ver mais</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>"
 ?>


        
        
<?php require_once __DIR__ . '/includes/footer.php'; ?>
