<?php

require_once "config.php";

include "cabecalho.php";

$erro = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = trim($_POST['nome'] ?? '');

    $email = trim($_POST['email'] ?? '');

    $telefone = trim($_POST['telefone'] ?? '');

    if(!$nome || !$email){

        $erro =
        "Nome e e-mail obrigatórios.";

    } else {

        $stmt = $pdo->prepare(

            'INSERT INTO contatos
            (nome, email, telefone)

            VALUES (?, ?, ?)'

        );

        $stmt->execute([
            $nome,
            $email,
            $telefone
        ]);

        header('Location:index.php');

        exit;
    }
}

?>

<h1>Novo Contato</h1>

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

        E-mail:

        <input type="email" name="email">

    </p>

    <p>

        Telefone:

        <input type="text" name="telefone">

    </p>

    <button type="submit">
        Cadastrar
    </button>

</form>

</body>
</html>