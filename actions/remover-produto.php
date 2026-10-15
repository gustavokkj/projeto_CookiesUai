<?php

    require_once dirname(__DIR__) . '/includes/auth.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once dirname(__DIR__) . '/config/database.php';
        $idProduto = $_POST['idProduto'];
        $removerProduto = "DELETE FROM Produtos WHERE idProduto = $idProduto";

        $res = mysqli_query($conn, $removerProduto); //Executa a query
        mysqli_close($conn);

        redirect_to('index.php');
    }

?>
