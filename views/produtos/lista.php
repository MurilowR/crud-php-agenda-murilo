    <h1>Produtos</h1>

    <a href="index.php?pagina=novo_produto">

    Novo Produto

    </a>

    <br><br>

    <table>

    <tr>

    <th>ID</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Estoque</th>
    <th>Imagem</th>
    <th>Editar</th>
    <th>Excluir</th>

    </tr>

    <?php foreach($produtos as $produto): ?>

    <tr>

    <td><?= $produto['id'] ?></td>

    <td><?= $produto['nome'] ?></td>

    <td>

    R$
    <?= number_format(
        $produto['preco'],
        2,
        ',',
        '.'
    ) ?>

    </td>

    <td><?= $produto['estoque'] ?></td>

    <td>

    <?php if(!empty($produto['imagem'])): ?>

    <img
        src="uploads/<?= $produto['imagem'] ?>"
        width="100"
    >

    <?php endif; ?>

    </td>

        <td>

<a href="index.php?pagina=editar_produto&id=<?= $produto['id'] ?>">

Editar

</a>

</td>

    <td>

    <a href="index.php?pagina=excluir_produto&id=<?= $produto['id'] ?>">

    Excluir

    </a>

    </td>

    </tr>

    <?php endforeach; ?>

    </table>