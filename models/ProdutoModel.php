<?php

class ProdutoModel {

    public static function findAll(PDO $pdo){

        $stmt = $pdo->query(

            'SELECT * FROM produtos
             ORDER BY nome'

        );

        return $stmt->fetchAll();
    }
}