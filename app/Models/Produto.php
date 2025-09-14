<?php
class Produto
{
    public static function all()
    {
        $stmt = DB::getConnection()->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $stmt = DB::getConnection()->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $sql = "INSERT INTO produtos (nome, sku, preco, estoque, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = DB::getConnection()->prepare($sql);
        return $stmt->execute([
            $data['nome'],
            $data['sku'],
            $data['preco'],
            $data['estoque'],
            $data['status']
        ]);
    }

    public static function update($id, $data)
    {
        $sql = "UPDATE produtos SET nome=?, sku=?, preco=?, estoque=?, status=? WHERE id=?";
        $stmt = DB::getConnection()->prepare($sql);
        return $stmt->execute([
            $data['nome'],
            $data['sku'],
            $data['preco'],
            $data['estoque'],
            $data['status'],
            $id
        ]);
    }

    public static function delete($id)
    {
        $stmt = DB::getConnection()->prepare("DELETE FROM produtos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
