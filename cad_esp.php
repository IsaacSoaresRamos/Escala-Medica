<?php 
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}elseif ($_SESSION['adm'] == 'NAO'){
    header("Location: index_logado_serv.php?msgErro=Você não tem permição de acessar essa pagina");
    die();
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Especialidade</title>
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/cad_esp.css">
</head>
  <body class="wallpaper"> 
    <manin>
      <header class="hdr"> <!--Cabeçalho-->
          <figure class="logo">
              <img src="img/logo.png">
          </figure>
                
          <nav class="menu"> <!--Menu-->
              <div class="packge-menu">
                  <section class="pack-menu">
                      <a href="tabela_adm.php"><p type="button" >Escala</p></a>
                      <a href="index_logado_adm.php"><p type="button">Gerenciamento</p></a>
                      <a href="sobre.php"><p type="button" >Sobre</p></a>
                      <a href="Logout.php" class="link-login"><button type="login">Sair</button></a>
                  </section>
              </div>
          </nav>
      </header>
      <div class="containe">
        <h1>Cadastrar Especialidade</h1>
        <section>
          <div class="container-form">
            <form action="Processa_esp.php" method="post">
                <div class="btn-esp">
                  <label for="nome">Nome da Especialidade</label><br/>
                  <input type="text" name="esp" id="esp">
                </div>
                <div class="btn-cad-can"> <!-- Botão Cadastrar/Cancelar --> 
                  <button type="submit" name="enviarDados" value="CAD" class="cad">Cadastrar</button>
                  <button class="can-btn"><a href="list_esp.php"  class="can_link">Cancelar</a></button>
                </div>
            </form>
          </div>
        </section>  
      </manin>
    </body>
</html>