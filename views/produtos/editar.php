<h1>Editar Produto</h1>

<form method="POST">

<p>
Nome:
<input
type="text"
name="nome"
value="<?= $produto['nome'] ?>"
>
</p>

<p>
Preço:
<input
type="number"
step="0.01"
name="preco"
value="<?= $produto['preco'] ?>"
>
</p>

<p>
Estoque:
<input
type="number"
name="estoque"
value="<?= $produto['estoque'] ?>"
>
</p>

<button type="submit">
Salvar
</button>

</form>