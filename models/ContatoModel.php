<?php

class ContatoModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(

            'SELECT * FROM contatos
             ORDER BY nome'

        );

        return $stmt->fetchAll();
    }

    public static function find(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(

            'SELECT * FROM contatos
             WHERE id=?'

        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function create(
        PDO $pdo,
        array $dados
    ){

        $stmt = $pdo->prepare(

            'INSERT INTO contatos
            (nome, email, telefone)

            VALUES (?, ?, ?)'

        );

        return $stmt->execute([

            $dados['nome'],
            $dados['email'],
            $dados['telefone']

        ]);
    }

    public static function update(
        PDO $pdo,
        int $id,
        array $dados
    ){

        $stmt = $pdo->prepare(

            'UPDATE contatos

             SET nome=?,
                 email=?,
                 telefone=?

             WHERE id=?'

        );

        return $stmt->execute([

            $dados['nome'],
            $dados['email'],
            $dados['telefone'],
            $id

        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(

            'DELETE FROM contatos
             WHERE id=?'

        );

        return $stmt->execute([$id]);
    }
}