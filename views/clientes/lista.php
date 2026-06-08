<h1>Clientes</h1>

<a href="index.php?pagina=novo_cliente">
    Novo Cliente
</a>

<br><br>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>CPF</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>Editar</th>
    <th>Excluir</th>
</tr>

<?php foreach($clientes as $cliente): ?>

<tr>

    <td><?= $cliente['id'] ?></td>
    <td><?= $cliente['nome'] ?></td>
    <td><?= $cliente['cpf'] ?></td>
    <td><?= $cliente['email'] ?></td>
    <td><?= $cliente['telefone'] ?></td>
    <td><?= $cliente['endereco'] ?></td>

    <td>
        <a href="index.php?pagina=editar_cliente&id=<?= $cliente['id'] ?>">
            Editar
        </a>
    </td>

    <td>
        <a
        onclick="return confirm('Deseja excluir este cliente?')"
        href="index.php?pagina=excluir_cliente&id=<?= $cliente['id'] ?>">
            Excluir
        </a>
    </td>

</tr>

<?php endforeach; ?>

</table>