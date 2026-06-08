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

            public static function findById(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(
            'SELECT * FROM produtos WHERE id=?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function update(
        PDO $pdo,
        Produto $produto
    ){

        $stmt = $pdo->prepare(

            'UPDATE produtos

            SET
            nome=?,
            preco=?,
            estoque=?,
            imagem=?
            WHERE id=?'

        );

        return $stmt->execute([

            $produto->getNome(),
            $produto->getPreco(),
            $produto->getEstoque(),
            $produto->getImagem(),
            $produto->getId()
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