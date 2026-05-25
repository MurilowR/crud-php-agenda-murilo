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

    $stmt = $pdo->prepare(
        'DELETE FROM contatos WHERE id=?'
    );

    $stmt->execute([$id]);

    header('Location:index.php');

    exit;
}

?>

<h1>Excluir Contato</h1>

<p>

Deseja excluir:

<strong>
<?= $contato['nome'] ?>
</strong>

?

</p>

<form method="POST">

    <button type="submit">

        Confirmar Exclusão

    </button>

</form>

</body>
</html>