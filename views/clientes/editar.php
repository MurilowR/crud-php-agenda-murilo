<h1>Editar Cliente</h1>

<form method="POST">

<p>
Nome:
<input
type="text"
name="nome"
value="<?= $cliente['nome'] ?>">
</p>

<p>
CPF:
<input
type="text"
name="cpf"
value="<?= $cliente['cpf'] ?>">
</p>

<p>
Email:
<input
type="email"
name="email"
value="<?= $cliente['email'] ?>">
</p>

<p>
Telefone:
<input
type="text"
name="telefone"
value="<?= $cliente['telefone'] ?>">
</p>

<p>
Endereço:
<input
type="text"
name="endereco"
value="<?= $cliente['endereco'] ?>">
</p>

<button type="submit">
Atualizar
</button>

</form>