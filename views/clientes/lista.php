<h1>Clientes</h1>

<table>

<tr>

<th>ID</th>
<th>Nome</th>
<th>CPF</th>
<th>Email</th>

</tr>

<?php foreach($clientes as $cliente): ?>

<tr>

<td><?= $cliente['id'] ?></td>

<td><?= $cliente['nome'] ?></td>

<td><?= $cliente['cpf'] ?></td>

<td><?= $cliente['email'] ?></td>

</tr>

<?php endforeach; ?>

</table>