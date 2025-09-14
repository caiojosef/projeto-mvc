<?php
// Classe base para todos os controllers herdarem

class Controller
{
    // Função para renderizar uma view
    protected function view($caminho, $dados = [])
    {
        extract($dados); // Transforma array em variáveis
        require __DIR__ . "/../Views/{$caminho}.php";
    }
    public function show($id)
    {
        echo json_encode(Produto::find($id));
    }
}
