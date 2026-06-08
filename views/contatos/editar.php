<h2>Editar Contato</h2>

<form method="POST">

    <p>
        Nome:
        <input
            type="text"
            name="nome"
            value="<?= $contato['nome'] ?>"
        >
    </p>

    <p>
        Email:
        <input
            type="email"
            name="email"
            value="<?= $contato['email'] ?>"
        >
    </p>

    <p>
        Telefone:
        <input
            type="text"
            name="telefone"
            value="<?= $contato['telefone'] ?>"
        >
    </p>

    <button type="submit">
        Salvar
    </button>

</form>