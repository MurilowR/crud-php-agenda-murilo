<h1>Contatos</h1>
<a href="index.php?pagina=novo_contato">

Novo Contato

</a>

<br><br>
<table>

<tr>

<th>ID</th>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
<th>Excluir</th>

</tr>

<?php foreach($contatos as $contato): ?>

<tr>

<td><?= $contato['id'] ?></td>

<td><?= $contato['nome'] ?></td>

<td><?= $contato['email'] ?></td>

<td><?= $contato['telefone'] ?></td>

<td>

<a href="index.php?pagina=excluir_contato&id=<?= $contato['id'] ?>">

Excluir

</a>

</td>

</tr>

<?php endforeach; ?>

</table>