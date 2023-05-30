<html>
    <head>

    </head>
    <body>
        <h1>Cadastrar novo usuario</h1>
        <form action="Processa_user.php" method="post">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" id="nome" class="">
            <br>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="">
            <br>
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" id="matricula" class="">
            <br>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="">
            <br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="">
            <br>
            <button type="submit" name="enviarDados" class="">Cadastrar</button>
            <a href="index.php" class="">Cancelar</a>
        </form>
    </body>
</html>