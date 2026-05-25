<?php

class ProdutoModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(

            'SELECT * FROM produtos
             ORDER BY nome'

        );

        return $stmt->fetchAll();
    }

    public static function create(
        PDO $pdo,
        array $dados
    ){

        $stmt = $pdo->prepare(

            'INSERT INTO produtos
            (nome, preco, estoque, imagem)

            VALUES (?, ?, ?, ?)'

        );

        return $stmt->execute([

            $dados['nome'],
            $dados['preco'],
            $dados['estoque'],
            $dados['imagem']

        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(

            'DELETE FROM produtos
             WHERE id=?'

        );

        return $stmt->execute([$id]);
    }
}