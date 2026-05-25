<?php

require_once "config.php";

include "cabecalho.php";

include "funcoes_produtos.php";

$produtos = obterProdutos($pdo);

?>

<h1>Produtos</h1>

<p>

    <a href="cadastro_produto.php">
        Novo Produto
    </a>

</p>

<?php

exibirTabelaProdutos($produtos);

?>

</body>
</html>