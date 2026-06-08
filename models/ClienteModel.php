<?php

class ClienteModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(
            'SELECT * FROM clientes ORDER BY nome'
        );

        return $stmt->fetchAll();
    }

    public static function create(
        PDO $pdo,
        Cliente $cliente
    ){

        $stmt = $pdo->prepare(

            'INSERT INTO clientes
            (nome, cpf, email, telefone, endereco)

            VALUES (?, ?, ?, ?, ?)'

        );

        return $stmt->execute([

            $cliente->getNome(),
            $cliente->getCpf(),
            $cliente->getEmail(),
            $cliente->getTelefone(),
            $cliente->getEndereco()

]);


    }

        public static function findById(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(
            'SELECT * FROM clientes WHERE id=?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function update(
        PDO $pdo,
        Cliente $cliente
    ){

        $stmt = $pdo->prepare(

            'UPDATE clientes

            SET
            nome=?,
            cpf=?,
            email=?,
            telefone=?,
            endereco=?

            WHERE id=?'

        );

        return $stmt->execute([

            $cliente->getNome(),
            $cliente->getCpf(),
            $cliente->getEmail(),
            $cliente->getTelefone(),
            $cliente->getEndereco(),
            $cliente->getId()

        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ){

        $stmt = $pdo->prepare(
            'DELETE FROM clientes WHERE id=?'
        );

        return $stmt->execute([$id]);
    }
}