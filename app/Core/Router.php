<?php
// Roteador simples: interpreta a URL e chama o controller correto

require_once __DIR__ . '/../../app/Controllers/ProdutosController.php';

class Router
{
    public function handle()
    {
        $base = '/projeto-mvc/public';
        $uri = str_replace($base, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $method = $_SERVER['REQUEST_METHOD'];

        // Define os headers somente se for rota de API
        if (str_starts_with($uri, '/produtos') && $uri !== '/produtos/pagina') {
            header("Content-Type: application/json; charset=utf-8");
        }

        if ($uri === '/produtos/pagina' && $method === 'GET') {
            (new ProdutosController())->pagina();
        } elseif ($uri === '/produtos' && $method === 'GET') {
            (new ProdutosController())->index();
        } elseif ($uri === '/produtos' && $method === 'POST') {
            (new ProdutosController())->store();
        } elseif (preg_match('#^/produtos/(\d+)$#', $uri, $matches) && $method === 'GET') {
            (new ProdutosController())->show($matches[1]);
        } elseif (preg_match('#^/produtos/(\d+)$#', $uri, $matches) && $method === 'POST') {
            (new ProdutosController())->update($matches[1]);
        } elseif (preg_match('#^/produtos/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
            (new ProdutosController())->destroy($matches[1]);
        } elseif (preg_match('#^/produtos/(\d+)$#', $uri, $matches) && $method === 'POST') {
            (new ProdutosController())->update($matches[1]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Rota não encontrada']);
        }
    }

}
