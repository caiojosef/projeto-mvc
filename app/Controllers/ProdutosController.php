<?php
require_once __DIR__ . '/../Core/DB.php';
require_once __DIR__ . '/../Models/Produto.php';
require_once __DIR__ . '/../Core/Controller.php';

class ProdutosController extends Controller
{
    public function index()
    {
        echo json_encode(Produto::all());
    }

    public function store()
    {
        $data = $_POST;

        if (Produto::create($data)) {
            $_SESSION['flash'] = ['tipo' => 'sucesso', 'mensagem' => 'Produto cadastrado com sucesso!'];
        } else {
            $_SESSION['flash'] = ['tipo' => 'erro', 'mensagem' => 'Erro ao cadastrar produto.'];
        }

        header("Location: /projeto-mvc/public/produtos/pagina");
        exit;
    }

    public function update($id)
    {
        $data = $_POST;
        Produto::update($id, $data);
        echo json_encode(['success' => true]);
    }

    public function destroy($id)
    {
        Produto::delete($id);
        echo json_encode(['success' => true]);
    }

    public function show($id)
    {
        echo json_encode(Produto::find($id));
    }
    public function pagina()
    {
        // Exibe a interface visual (formulário + tabela)
        $this->view('produtos/index');
    }
}
