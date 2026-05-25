<?php

function obterContatos(
    PDO $pdo,
    string $busca = '',
    int $pagina = 1,
    int $porPagina = 10
): array {

    $offset = ($pagina - 1) * $porPagina;

    $termo = '%' . $busca . '%';

    $stmt = $pdo->prepare(

        'SELECT *
         FROM contatos
         WHERE nome LIKE ?
         OR email LIKE ?
         ORDER BY nome
         LIMIT ? OFFSET ?'

    );

    $stmt->execute([
        $termo,
        $termo,
        $porPagina,
        $offset
    ]);

    return $stmt->fetchAll();
}

function contarContatos(
    PDO $pdo,
    string $busca = ''
): int {

    $termo = '%' . $busca . '%';

    $stmt = $pdo->prepare(

        'SELECT COUNT(*) as total
         FROM contatos
         WHERE nome LIKE ?
         OR email LIKE ?'

    );

    $stmt->execute([
        $termo,
        $termo
    ]);

    return $stmt->fetch()['total'];
}

function exibirTabelaContatos(
    array $contatos
): void {

    if(empty($contatos)){

        echo "<p>Nenhum contato encontrado.</p>";

        return;
    }

    echo "<table>";

    echo "
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    ";

    foreach($contatos as $contato){

        $id = $contato['id'];

        echo "<tr>";

        echo "<td>{$id}</td>";

        echo "<td>{$contato['nome']}</td>";

        echo "<td>{$contato['email']}</td>";

        echo "<td>{$contato['telefone']}</td>";

        echo "
        <td>
            <a href='editar_contato.php?id=$id'>
                Editar
            </a>
        </td>
        ";

        echo "
        <td>
            <a href='excluir_contato.php?id=$id'>
                Excluir
            </a>
        </td>
        ";

        echo "</tr>";
    }

    echo "</table>";
}