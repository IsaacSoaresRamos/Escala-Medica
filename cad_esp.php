<<?php 
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

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
            <button type="submit" name="enviarDados" value="CAD" class="">Cadastrar</button>
            <a href="list_esp.php" class="">Cancelar</a>
        </form>
    </body>
</html>