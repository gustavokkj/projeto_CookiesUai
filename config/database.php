<?php

$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$senhaBD = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_DATABASE') ?: 'cookiesuai';

$conn = mysqli_connect($host, $user, $senhaBD, $database);

if (!$conn) {
    throw new RuntimeException(
        "Não foi possível conectar ao banco de dados {$database}: " . mysqli_connect_error()
    );
}

mysqli_set_charset($conn, 'utf8mb4');
