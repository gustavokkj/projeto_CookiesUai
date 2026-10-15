<?php

require_once dirname(__DIR__) . '/config/app.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    redirect_to('pages/login.php?erroLogin=naoLogado');
}

if (($_SESSION['tipoUsuario'] ?? null) !== 'adm') {
    redirect_to('index.php');
}
