<<?php 
require_once 'Conexao.php';

session_start();

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}
?>

<html>
    <head>

    </head>
    <body>
        <h1>Cadastrar nova Especialidade</h1>
        <form action="Processa_esp.php" method="post">
            <label for="nome">Nome da Especialidade</label>
            <input type="text" name="esp" id="esp" class="">
            <br>
            <button type="submit" name="enviarDados" class="">Cadastrar</button>
            <a href="index_logado.php" class="">Cancelar</a>
        </form>
    </body>
</html>