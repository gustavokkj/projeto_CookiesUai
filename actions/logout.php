<?php
    require_once dirname(__DIR__) . '/config/app.php';

    session_start(); //Inicia sessão
    session_unset(); //Apaga sessão
    session_destroy(); //Destrói sessão

    redirect_to('pages/login.php');
?>
