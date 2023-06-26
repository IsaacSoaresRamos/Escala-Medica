<?php
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
} elseif ($_SESSION['adm'] == 'NAO'){
    header("Location: index_logado_serv.php?msgErro=Você não tem permição de acessar essa pagina");
    die();
}

$sql = "SELECT * FROM especialidade ORDER BY id_esp ASC";
  try {
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
      // Execução da SQL Ok!!
      $esp = $stmt->fetchAll();
    }
    else {
      die("Falha ao executar a SQL.. #2");
    }

  } catch (PDOException $e) {
    die($e->getMessage());
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialidades</title>
    <!-- Icon Google -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/list_esp.css">
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
                      <a href="cad_esp.php"><p type="button">Cadastro</p></a>
                      <a href="sobre.php"><p type="button" >Sobre</p></a>
                      <a href="index_logado_adm.php" class="link-login"><button type="login">Voltar</button></a>
                  </section>
              </div>
          </nav>
      </header>
      <main>
        <div class="packege-tab">
          <h1>Especialidades</h1>
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
            
          <?php if (!empty($esp)) { ?>
          <!-- Aqui que será montada a tabela com a relação de especialidades!! -->
          <div class="pack-tab">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($esp as $s) { ?>
                  <tr>
                    <th scope="row"><?php echo $s['id_esp']; ?></th>
                    <td><?php echo $s['esp']; ?></td>
                    <td><!--Ação-->
                      <div class="icons-acao">
                        <div class="btn-edit">
                          <a href="alt_esp.php?id_esp=<?php echo $s['id_esp']; ?>"><span class="material-symbols-outlined icon-edit">edit</span></a>
                        </div>
                        <div class="btn-del">
                          <a href="del_esp.php?id_esp=<?php echo $s['id_esp']; ?>"><span class="material-symbols-outlined icon-del">delete</span></a>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
      </main>
  </body>
</html>