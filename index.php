<?php

$pdo = require 'config/database.php';

require 'models/ContatoModel.php';

require 'models/ClienteModel.php';

require 'models/ProdutoModel.php';

include 'views/cabecalho.php';

$pagina = $_GET['pagina'] ?? 'contatos';





/* =========================
   CONTATOS
========================= */

if($pagina == 'contatos'){

    $contatos =
    ContatoModel::findAll($pdo);

    include
    'views/contatos/lista.php';
}





elseif($pagina == 'novo_contato'){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        ContatoModel::create($pdo, [

            'nome' =>
            $_POST['nome'],

            'email' =>
            $_POST['email'],

            'telefone' =>
            $_POST['telefone']

        ]);

        header('Location:index.php');

        exit;
    }

    include
    'views/contatos/form.php';
}





elseif($pagina == 'excluir_contato'){

    $id = $_GET['id'];

    ContatoModel::delete($pdo, $id);

    header('Location:index.php');

    exit;
}





/* =========================
   CLIENTES
========================= */

elseif($pagina == 'clientes'){

    $clientes =
    ClienteModel::findAll($pdo);

    include
    'views/clientes/lista.php';
}





elseif($pagina == 'novo_cliente'){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        ClienteModel::create($pdo, [

            'nome' =>
            $_POST['nome'],

            'cpf' =>
            $_POST['cpf'],

            'email' =>
            $_POST['email']

        ]);

        header(
            'Location:index.php?pagina=clientes'
        );

        exit;
    }

    include
    'views/clientes/form.php';
}





elseif($pagina == 'excluir_cliente'){

    $id = $_GET['id'];

    ClienteModel::delete($pdo, $id);

    header(
        'Location:index.php?pagina=clientes'
    );

    exit;
}





/* =========================
   PRODUTOS
========================= */

elseif($pagina == 'produtos'){

    $produtos =
    ProdutoModel::findAll($pdo);

    include
    'views/produtos/lista.php';
}





elseif($pagina == 'novo_produto'){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nomeImagem = null;





        if(!empty($_FILES['imagem']['name'])){

            $extensao = pathinfo(

                $_FILES['imagem']['name'],

                PATHINFO_EXTENSION

            );

            $nomeImagem =
                uniqid() . '.' . $extensao;

            move_uploaded_file(

                $_FILES['imagem']['tmp_name'],

                'uploads/' . $nomeImagem

            );
        }





        ProdutoModel::create($pdo, [

            'nome' =>
            $_POST['nome'],

            'preco' =>
            $_POST['preco'],

            'estoque' =>
            $_POST['estoque'],

            'imagem' =>
            $nomeImagem

        ]);

        header(
            'Location:index.php?pagina=produtos'
        );

        exit;
    }

    include
    'views/produtos/form.php';
}




elseif($pagina == 'excluir_produto'){

    $id = $_GET['id'];

    ProdutoModel::delete($pdo, $id);

    header(
        'Location:index.php?pagina=produtos'
    );

    exit;
}

?>

</body>
</html>