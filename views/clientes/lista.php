<h1>Clientes</h1>
<a href="index.php?pagina=novo_cliente">

Novo Cliente

</a>

<br><br>
<table>

<tr>

<th>ID</th>
<th>Nome</th>
<th>CPF</th>
<th>Email</th>
<th>Excluir</th>

</tr>

<?php foreach($clientes as $cliente): ?>

<tr>

<td><?= $cliente['id'] ?></td>

<td><?= $cliente['nome'] ?></td>

<td><?= $cliente['cpf'] ?></td>

<td><?= $cliente['email'] ?></td>

<td>

<a href="index.php?pagina=excluir_cliente&id=<?= $cliente['id'] ?>">

Excluir

</a>

</td>

</tr>

<?php endforeach; ?>

</table>