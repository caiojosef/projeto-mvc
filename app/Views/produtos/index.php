<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/projeto-mvc/public/assets/js/produtos.js"></script>
    <link rel="stylesheet" href="/projeto-mvc/public/assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <?php session_start(); ?>
    <?php require_once __DIR__ . '/_flash.php'; ?>
    <h1>Produtos</h1>

    <form id="form-produto">
        <input name="nome" placeholder="Nome" required>
        <input name="sku" placeholder="SKU" required>
        <input name="preco" placeholder="Preço" required>
        <input name="estoque" placeholder="Estoque" required>
        <select name="status">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
        <button type="submit">Salvar</button>
    </form>

    <table id="tabela-produtos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>SKU</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Status</th>
                <th>Ações</th> <!-- NOVO -->
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</body>

</html>