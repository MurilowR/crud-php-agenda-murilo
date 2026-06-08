<?php

class ContatoModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(
            'SELECT * FROM contatos ORDER BY nome'
        );

        return $stmt->fetchAll();
    }

    public static function create(
        PDO $pdo,
        Contato $contato
    ){

        $stmt = $pdo->prepare(

            'INSERT INTO contatos
            (nome, email, telefone)

            VALUES (?, ?, ?)'

        );

        return $stmt->execute([

            $contato->getNome(),
            $contato->getEmail(),
            $contato->getTelefone()

        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(
            'DELETE FROM contatos WHERE id=?'
        );

        return $stmt->execute([$id]);
    }
}