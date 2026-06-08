<?php

$pdo = require 'config/database.php';

require 'models/ContatoModel.php';

require 'models/ClienteModel.php';

require 'models/ProdutoModel.php';

include 'views/cabecalho.php';

require 'models/Cliente.php';

require 'models/Contato.php';

require 'models/Produto.php';

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

        $contato = new Contato();

        $contato->setNome($_POST['nome']);
        $contato->setEmail($_POST['email']);
        $contato->setTelefone($_POST['telefone']);

        ContatoModel::create($pdo, $contato);

        header('Location:index.php');
        exit;
    }

    include 'views/contatos/form.php';
}


elseif($pagina == 'editar_contato'){

    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $contato = new Contato();

        $contato->setId($id);
        $contato->setNome($_POST['nome']);
        $contato->setEmail($_POST['email']);
        $contato->setTelefone($_POST['telefone']);

        ContatoModel::update(
            $pdo,
            $contato
        );

        header('Location:index.php');

        exit;
    }

    $contato = ContatoModel::findById(
        $pdo,
        $id
    );

    include
    'views/contatos/editar.php';
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

        $cliente = new Cliente();

        $cliente->setNome($_POST['nome']);
        $cliente->setCpf($_POST['cpf']);
        $cliente->setEmail($_POST['email']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        ClienteModel::create($pdo, $cliente);

        header('Location:index.php?pagina=clientes');
        exit;
    }

    include 'views/clientes/form.php';
}

elseif($pagina == 'editar_cliente'){

    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $cliente = new Cliente();

        $cliente->setId($id);
        $cliente->setNome($_POST['nome']);
        $cliente->setCpf($_POST['cpf']);
        $cliente->setEmail($_POST['email']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        ClienteModel::update(
            $pdo,
            $cliente
        );

        header(
            'Location:index.php?pagina=clientes'
        );

        exit;
    }

    $cliente = ClienteModel::findById(
        $pdo,
        $id
    );

    include
    'views/clientes/editar.php';
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





        $produto = new Produto();

        $produto->setNome($_POST['nome']);
        $produto->setPreco($_POST['preco']);
        $produto->setEstoque($_POST['estoque']);
        $produto->setImagem($nomeImagem);

        ProdutoModel::create($pdo, $produto);

        header(
            'Location:index.php?pagina=produtos'
        );

        exit;
    }

    include
    'views/produtos/form.php';
}

elseif($pagina == 'editar_produto'){

    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $produto = new Produto();

        $produto->setId($id);
        $produto->setNome($_POST['nome']);
        $produto->setPreco($_POST['preco']);
        $produto->setEstoque($_POST['estoque']);

        ProdutoModel::update(
            $pdo,
            $produto
        );

        header(
            'Location:index.php?pagina=produtos'
        );

        exit;
    }

    $produto = ProdutoModel::findById(
        $pdo,
        $id
    );

    include
    'views/produtos/editar.php';
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