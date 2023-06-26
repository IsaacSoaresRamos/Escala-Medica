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
$result = array();

// Verificar se está chegando a informação (id_esp) pelo $_GET
if (!empty($_GET['id_esp'])) {

  // Buscar as informações da especialidade a ser alterado (no banco de dados)
  $sql = "SELECT * FROM especialidade WHERE id_esp = :id_esp";
  try {
    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(':id_esp' => $_GET['id_esp']));

    
    if ($stmt->rowCount() == 1) {
      // Registro obtido no banco de dados
      $result = $stmt->fetchAll();
      $result = $result[0]; // Informações do registro a ser alterado
    }
    else {
      header("Location: list_esp.php");
      die();
    }

  } catch (PDOException $e) {
    header("Location: list_esp.php?msgErro=Falha ao obter registro no banco de dados.");
  }
}
else {
  // Se entrar aqui, significa que $_GET['id_esp'] está vazio
  header("Location: list_esp.php?msgErro=Você não tem permissão para acessar esta página");
  die();
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
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
        <h1>Editar Especialidade</h1>
        <section>
          <div class="container-form">
            <form action="Processa_esp.php" method="post">
                <div class="btn-esp">
                  <label for="nome">Nome da Especialidade</label><br/>
                  <input type="text" class="" name="esp" id="esp" value="<?php echo $result['esp']; ?>" >
                </div>
                <div class="btn-cad-can"> <!-- Botão Cadastrar/Cancelar --> 
                  <button type="submit" name="enviarDados" class="cad" value="ALT">Alterar</button>
                  <button class="can-btn"><a href="list_esp.php"  class="can_link">Cancelar</a></button>
                </div>
                <label for="id_esp"></label>
                <input type="hidden" class="" name="id_esp" id="id_esp" value="<?php echo $result['id_esp']; ?>" readonly>
          </div>
        </section>
      </div>
    </manin>  
  </body>
</html>