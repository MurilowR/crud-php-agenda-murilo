<?php

class ProdutoModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(
            'SELECT * FROM produtos ORDER BY nome'
        );

        return $stmt->fetchAll();
    }

    public static function create(
        PDO $pdo,
        Produto $produto
    ){

        $stmt = $pdo->prepare(

            'INSERT INTO produtos
            (nome, preco, estoque, imagem)

            VALUES (?, ?, ?, ?)'

        );

        return $stmt->execute([

            $produto->getNome(),
            $produto->getPreco(),
            $produto->getEstoque(),
            $produto->getImagem()

        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(
            'DELETE FROM produtos WHERE id=?'
        );

        return $stmt->execute([$id]);
    }
}