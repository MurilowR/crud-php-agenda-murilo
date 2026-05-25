<?php

require_once "config.php";

include "cabecalho.php";

include "funcoes_clientes.php";

$clientes = obterClientes($pdo);

?>

<h1>Clientes</h1>

<p>

    <a href="cadastro_cliente.php">
        Novo Cliente
    </a>

</p>

<?php

exibirTabelaClientes($clientes);

?>

</body>
</html>