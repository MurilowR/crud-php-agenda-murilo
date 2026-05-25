<?php

$pdo = require 'config/database.php';

require 'models/ContatoModel.php';

require 'models/ClienteModel.php';

require 'models/ProdutoModel.php';

include 'views/cabecalho.php';

$pagina = $_GET['pagina'] ?? 'contatos';





if($pagina == 'contatos'){

    $contatos =
    ContatoModel::findAll($pdo);

    include
    'views/contatos/lista.php';
}





elseif($pagina == 'clientes'){

    $clientes =
    ClienteModel::findAll($pdo);

    include
    'views/clientes/lista.php';
}





elseif($pagina == 'produtos'){

    $produtos =
    ProdutoModel::findAll($pdo);

    include
    'views/produtos/lista.php';
}

?>

</body>
</html>