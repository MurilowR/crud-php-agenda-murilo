<?php

require_once "config.php";

include "cabecalho.php";

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare(
    'SELECT * FROM contatos WHERE id=?'
);

$stmt->execute([$id]);

$contato = $stmt->fetch();

if(!$contato){

    die("Contato não encontrado.");
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = trim($_POST['nome']);

    $email = trim($_POST['email']);

    $telefone = trim($_POST['telefone']);

    $stmt = $pdo->prepare(

        'UPDATE contatos

         SET nome=?,
             email=?,
             telefone=?

         WHERE id=?'

    );

    $stmt->execute([
        $nome,
        $email,
        $telefone,
        $id
    ]);

    header('Location:index.php');

    exit;
}

?>

<h1>Editar Contato</h1>

<form method="POST">

    <p>

        Nome:

        <input
            type="text"
            name="nome"
            value="<?= $contato['nome'] ?>"
        >

    </p>

    <p>

        E-mail:

        <input
            type="email"
            name="email"
            value="<?= $contato['email'] ?>"
        >

    </p>

    <p>

        Telefone:

        <input
            type="text"
            name="telefone"
            value="<?= $contato['telefone'] ?>"
        >

    </p>

    <button type="submit">
        Salvar
    </button>

</form>

</body>
</html>