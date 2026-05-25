<?php

require_once "config.php";

include "cabecalho.php";

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare(
    'SELECT * FROM clientes WHERE id=?'
);

$stmt->execute([$id]);

$cliente = $stmt->fetch();

if(!$cliente){

    die("Cliente não encontrado.");
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = trim($_POST['nome']);

    $cpf = trim($_POST['cpf']);

    $email = trim($_POST['email']);

    $telefone = trim($_POST['telefone']);

    $endereco = trim($_POST['endereco']);

    $stmt = $pdo->prepare(

        'UPDATE clientes

         SET nome=?,
             cpf=?,
             email=?,
             telefone=?,
             endereco=?

         WHERE id=?'

    );

    $stmt->execute([
        $nome,
        $cpf,
        $email,
        $telefone,
        $endereco,
        $id
    ]);

    header('Location:clientes.php');

    exit;
}

?>

<h1>Editar Cliente</h1>

<form method="POST">

    <p>

        Nome:

        <input
            type="text"
            name="nome"
            value="<?= $cliente['nome'] ?>"
        >

    </p>

    <p>

        CPF:

        <input
            type="text"
            name="cpf"
            value="<?= $cliente['cpf'] ?>"
        >

    </p>

    <p>

        E-mail:

        <input
            type="email"
            name="email"
            value="<?= $cliente['email'] ?>"
        >

    </p>

    <p>

        Telefone:

        <input
            type="text"
            name="telefone"
            value="<?= $cliente['telefone'] ?>"
        >

    </p>

    <p>

        Endereço:

        <input
            type="text"
            name="endereco"
            value="<?= $cliente['endereco'] ?>"
        >

    </p>

    <button type="submit">

        Salvar

    </button>

</form>

</body>
</html>