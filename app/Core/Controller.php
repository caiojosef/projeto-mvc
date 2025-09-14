<?php
declare(strict_types=1);
/**
 * Helpers simples para renderizar views e redirecionar.
 * Manter código didático e direto.
 */
function view(string $template, array $vars = []): void {
    extract($vars);
    $path = __DIR__ . '/../Views/' . $template . '.php';
    if (!is_file($path)) { http_response_code(500); echo "View não encontrada: $template"; return; }
    include $path;
}
function redirect(string $path): void {
    header('Location: ' . $path);
    exit;
}
