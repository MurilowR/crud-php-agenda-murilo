<?php

require_once "config.php";

include "cabecalho.php";

$erro = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = trim($_POST['nome']);

    $descricao = trim($_POST['descricao']);

    $preco = (float) $_POST['preco'];

    $estoque = (int) $_POST['estoque'];

    $nomeArquivo = null;

    if($preco <= 0){

        $erro = 'Preço inválido.';
    }

    if($estoque < 0){

        $erro = 'Estoque inválido.';
    }

    if(!empty($_FILES['imagem']['name'])){

        $extensao = pathinfo(
            $_FILES['imagem']['name'],
            PATHINFO_EXTENSION
        );

        $permitidos = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        if(!in_array(
            strtolower($extensao),
            $permitidos
        )){

            $erro =
            'Tipo de imagem não permitido.';

        } else {

            $nomeArquivo =
            uniqid('prod_') .
            '.' .
            $extensao;

            move_uploaded_file(

                $_FILES['imagem']['tmp_name'],

                'uploads/' . $nomeArquivo
            );
        }
    }

    if(!$erro){

        $stmt = $pdo->prepare(

            'INSERT INTO produtos

            (nome, descricao,
             preco, estoque, imagem)

            VALUES (?, ?, ?, ?, ?)'

        );

        $stmt->execute([

            $nome,
            $descricao,
            $preco,
            $estoque,
            $nomeArquivo

        ]);

        header('Location:produtos.php');

        exit;
    }
}

?>

<h1>Novo Produto</h1>

<?php if($erro): ?>

<p style="color:red;">
    <?= $erro ?>
</p>

<?php endif; ?>

<form
    method="POST"
    enctype="multipart/form-data"
>

    <p>

        Nome:

        <input type="text" name="nome">

    </p>

    <p>

        Descrição:

        <textarea name="descricao"></textarea>

    </p>

    <p>

        Preço:

        <input
            type="number"
            step="0.01"
            name="preco"
        >

    </p>

    <p>

        Estoque:

        <input
            type="number"
            name="estoque"
        >

    </p>

    <p>

        Imagem:

        <input
            type="file"
            name="imagem"
        >

    </p>

    <button type="submit">

        Cadastrar

    </button>

</form>

</body>
</html>