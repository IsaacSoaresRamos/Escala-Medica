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

// Verificar se está chegando a informação (id_serv) pelo $_GET
if (!empty($_GET['id_serv'])) {

  // Buscar as informações do servidor a ser alterado (no banco de dados)
  $sql = "SELECT * FROM serv_log WHERE id_serv = :id_serv";
  try {
    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(':id_serv' => $_GET['id_serv']));

    if ($stmt->rowCount() == 1) {
      // Registro obtido no banco de dados
      $result = $stmt->fetchAll();
      $result = $result[0]; // Informações do registro a ser alterado
    }
    else {
      header("Location: index_logado.php");
      die();
    }

  } catch (PDOException $e) {
    header("Location: index_logado.php?msgErro=Falha ao obter registro no banco de dados.");
  }
}
else {
  // Se entrar aqui, significa que $_GET['id_serv'] está vazio
  header("Location: index_logado.php?msgErro=Você não tem permissão para acessar esta página");
  die();
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servidor</title>
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/alt_serv.css">
</head>
    <body class="wallpaper"> 
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

    <main>
      <div class="containe-alt">
        <header class="titulo">
          <h1>Editar Servidor</h1>
        </header>
        <section>
          <div class="container-form">
            <!-- Formulario -->
            <form action="processa_serv.php" method="post">
              <div class="pack-formI"> <!-- 1º Linha -->

                <div class="pack-input-idserv">
                  <label for="id_serv"></label><br>
                  <input type="hidden" name="id_serv" id="id_anuncio" value="<?php echo $result['id_serv']; ?>" readonly>
                </div>
                <div class="pack-input-name">
                  <label for="nome">Nome</label><br>
                  <input type="text" style="width: 200px;" name="nome" id="nome" value="<?php echo $result['nome']; ?>" >
                </div>

                <div class="pack-input-cpf">
                  <label for="cpf">CPF</label><br>
                  <input type="text" style="width: 150px;" name="cpf" id="cpf" value="<?php echo $result['cpf']; ?>" >
                </div>

                <div class="pack-input-matric">
                  <label for="cpf">Matricula</label><br>
                  <input type="text" class="" name="matricula" id="matricula" value="<?php echo $result['matricula']; ?>" readonly>
                </div>
              </div>
              <div class="pack-formII"> <!-- 2º Linha -->

                <div class="pack-input-email">
                  <label for="email">Email</label><br>
                  <input type="text" name="email" id="email" value="<?php echo $result['email']; ?>" >
                </div>
                  
                <div class="pack-select col-4">
                    <label for="adm">Adiministrador</label><br>
                    <select class="form-select"  name="adm" id="adm">
                      <option>Selecione o valor</option>
                      <option value="SIM" <?php echo $result['adm'] == "SIM" ? "selected" : "" ?>>Sim</option>
                      <option value="NAO" <?php echo $result['adm'] == "NAO" ? "selected" : "" ?>>Não</option>
                    </select>
                </div>
                
                <div class="pack-input-password">
                  <label for="senha">Senha</label><br>
                  <input type="password" name="senha" id="senha" value="<?php echo $result['senha']; ?>" >
                </div>
              </div>
              <div class="btn-cad-can"> <!-- Botão Cadastrar/Cancelar --> 
                  <button type="submit" name="enviarDados" class="cad" value="ALT">Salvar</button>  
                  <button class="can-btn"><a href="index_logado_adm.php" class="can_link">Cancelar</a></button>
              </div>
            </form>
          </div><!-- Fim container-form -->
        </section>
      </div>
    </main>
  </body>
</html>