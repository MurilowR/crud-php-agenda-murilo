<?php

function obterClientes(PDO $pdo): array {

    $stmt = $pdo->query(
        'SELECT * FROM clientes ORDER BY nome'
    );

    return $stmt->fetchAll();
}

function exibirTabelaClientes(
    array $clientes
): void {

    echo "<table>";

    echo "
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Endereço</th>
    </tr>
    ";

    foreach($clientes as $cliente){

        echo "<tr>";

        echo "<td>{$cliente['id']}</td>";

        echo "<td>{$cliente['nome']}</td>";

        echo "<td>{$cliente['cpf']}</td>";

        echo "<td>{$cliente['email']}</td>";

        echo "<td>{$cliente['telefone']}</td>";

        echo "<td>{$cliente['endereco']}</td>";

        echo "</tr>";
    }

    echo "</table>";
}