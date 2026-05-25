<?php

require_once "config.php";

include "cabecalho.php";

$erro = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = trim($_POST['nome']);

    $cpf = trim($_POST['cpf']);

    $email = trim($_POST['email']);

    $telefone = trim($_POST['telefone']);

    $endereco = trim($_POST['endereco']);

    if(strlen($cpf) != 14){

        $erro = "CPF inválido.";

    } else {

        $stmt = $pdo->prepare(

            'INSERT INTO clientes

            (nome, cpf, email, telefone, endereco)

            VALUES (?, ?, ?, ?, ?)'

        );

        $stmt->execute([

            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco

        ]);

        header('Location:clientes.php');

        exit;
    }
}

?>

<h1>Novo Cliente</h1>

<?php if($erro): ?>

<p style="color:red;">
    <?= $erro ?>
</p>

<?php endif; ?>

<form method="POST">

    <p>

        Nome:

        <input type="text" name="nome">

    </p>

    <p>

        CPF:

        <input
            type="text"
            name="cpf"
            placeholder="000.000.000-00"
        >

    </p>

    <p>

        E-mail:

        <input type="email" name="email">

    </p>

    <p>

        Telefone:

        <input type="text" name="telefone">

    </p>

    <p>

        Endereço:

        <input type="text" name="endereco">

    </p>

    <button type="submit">

        Cadastrar

    </button>

</form>

</body>
</html>