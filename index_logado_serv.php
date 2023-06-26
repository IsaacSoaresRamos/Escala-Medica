<?php
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

//if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  //header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  //die();
//}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Minha Área</title>
     <!-- Bootstrap -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!-- CSS -->
          <link rel="stylesheet" href="css/index_logado_serv.css">
</head>
<body class="wallpaper"> 
          <header class="hdr"> <!--Cabeçalho-->
               <figure class="logo">
                    <img src="img/logo.png">
               </figure>
               
               <nav class="menu"> <!--Menu-->
                    <div class="packge-menu">
                         <section class="pack-menu">
                              <a href="tabela_serv.php"><p type="button" >Escala</p></a>
                              <a href="sobre_serv.php"><p type="button" >Sobre</p></a>
                              <a href="Logout.php" class="link-login"><button type="login">Sair</button></a>
                         </section>
                    </div>
               </nav>
          </header>
          <?php if (!empty($_GET['msgErro'])) 
          { 
            echo $_GET['msgErro'];
          }
          ?>
          <?php if (!empty($_GET['msgSucesso'])) 
          {
            echo $_GET['msgSucesso'];
          }
          ?>
    <main class="packege"> <!--Conteudo-->
      <header class="pack-titulo">
        <h1>Olá <strong><?php echo $_SESSION['nome'];?></strong>!</h1>
        <h2>Sua agenda de gerenciamento<br/>de profissionais da saúde.</h2>
      </header>
    </main> 
  </body>
</html>