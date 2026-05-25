<?php

class ClienteModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(

            'SELECT * FROM clientes
             ORDER BY nome'

        );

        return $stmt->fetchAll();
    }
}