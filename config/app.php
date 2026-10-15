<?php

declare(strict_types=1);

define('APP_ROOT', dirname(__DIR__));

$documentRoot = isset($_SERVER['DOCUMENT_ROOT'])
    ? realpath((string) $_SERVER['DOCUMENT_ROOT'])
    : false;
$applicationRoot = realpath(APP_ROOT);
$baseUrl = '';

if ($documentRoot !== false && $applicationRoot !== false) {
    $normalizedDocumentRoot = str_replace('\\', '/', $documentRoot);
    $normalizedApplicationRoot = str_replace('\\', '/', $applicationRoot);

    if (str_starts_with(strtolower($normalizedApplicationRoot), strtolower($normalizedDocumentRoot))) {
        $baseUrl = '/' . trim(substr($normalizedApplicationRoot, strlen($normalizedDocumentRoot)), '/');
    }
}

define('APP_URL', rtrim($baseUrl, '/'));

function app_url(string $path = ''): string
{
    $path = ltrim($path, '/');

    return APP_URL . ($path === '' ? '/' : '/' . $path);
}

function product_image_url(?string $storedPath): string
{
    $filename = basename(str_replace('\\', '/', (string) $storedPath));
    $relativePath = 'assets/images/products/' . rawurlencode($filename);
    $filePath = APP_ROOT . '/assets/images/products/' . $filename;
    $version = is_file($filePath) ? '?v=' . filemtime($filePath) : '';

    return app_url($relativePath) . $version;
}

function redirect_to(string $path): never
{
    header('Location: ' . app_url($path));
    exit;
}
