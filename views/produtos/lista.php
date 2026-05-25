<h1>Produtos</h1>

<table>

<tr>

<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Estoque</th>

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

</tr>

<?php endforeach; ?>

</table>