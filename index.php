<?php

require_once "config.php";

include "cabecalho.php";

include_once "funcoes.php";

$busca = $_GET['busca'] ?? '';

$pagina = (int) ($_GET['pagina'] ?? 1);

$contatos = obterContatos(
    $pdo,
    $busca,
    $pagina
);

$total = contarContatos(
    $pdo,
    $busca
);

$totalPaginas = ceil($total / 10);

?>

<h1>Contatos</h1>

<p>

    <a href="cadastro_contato.php">
        Novo Contato
    </a>

</p>

<form method="GET">

    <input
        type="text"
        name="busca"
        placeholder="Buscar..."
        value="<?= htmlspecialchars($busca) ?>"
    >

    <button type="submit">
        Buscar
    </button>

</form>

<br>

<?php

exibirTabelaContatos($contatos);

?>

<br>

<?php for($i = 1; $i <= $totalPaginas; $i++): ?>

    <a href="?pagina=<?= $i ?>&busca=<?= urlencode($busca) ?>">

        <?= $i ?>

    </a>

<?php endfor; ?>

</body>
</html>