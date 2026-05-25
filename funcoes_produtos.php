<?php

function obterProdutos(PDO $pdo): array {

    $stmt = $pdo->query(
        'SELECT * FROM produtos ORDER BY nome'
    );

    return $stmt->fetchAll();
}

function exibirTabelaProdutos(
    array $produtos
): void {

    echo "<table>";

    echo "
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Imagem</th>
    </tr>
    ";

    foreach($produtos as $produto){

        echo "<tr>";

        echo "<td>{$produto['id']}</td>";

        echo "<td>{$produto['nome']}</td>";

        echo "<td>{$produto['descricao']}</td>";

        echo "<td>
        R$ " .
        number_format(
            $produto['preco'],
            2,
            ',',
            '.'
        ) .
        "</td>";

        echo "<td>{$produto['estoque']}</td>";

        echo "<td>";

        if($produto['imagem']){

            echo "
            <img
                src='uploads/{$produto['imagem']}'
                width='100'
            >
            ";
        }

        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";
}