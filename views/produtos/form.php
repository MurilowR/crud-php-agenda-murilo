<h1>Novo Produto</h1>

<form
method="POST"
enctype="multipart/form-data"
>

<p>

Nome:

<input type="text" name="nome">

</p>

<p>

Preço:

<input
type="number"
step="0.01"
name="preco"
>

</p>

<p>

Estoque:

<input
type="number"
name="estoque"
>

</p>

<p>

Imagem:

<input
type="file"
name="imagem"
>

</p>

<button type="submit">

Salvar

</button>

</form>