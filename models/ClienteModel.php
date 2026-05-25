<?php

class ClienteModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(

            'SELECT * FROM clientes
             ORDER BY nome'

        );

        return $stmt->fetchAll();
    }

    public static function create(
        PDO $pdo,
        array $dados
    ){

        $stmt = $pdo->prepare(

            'INSERT INTO clientes
            (nome, cpf, email)

            VALUES (?, ?, ?)'

        );

        return $stmt->execute([

            $dados['nome'],
            $dados['cpf'],
            $dados['email']

        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(

            'DELETE FROM clientes
             WHERE id=?'

        );

        return $stmt->execute([$id]);
    }
}