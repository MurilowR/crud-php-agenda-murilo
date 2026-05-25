<h1>Contatos</h1>

<table>

<tr>

<th>ID</th>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>

</tr>

<?php foreach($contatos as $contato): ?>

<tr>

<td><?= $contato['id'] ?></td>

<td><?= $contato['nome'] ?></td>

<td><?= $contato['email'] ?></td>

<td><?= $contato['telefone'] ?></td>

</tr>

<?php endforeach; ?>

</table>