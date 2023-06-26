<?php
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}
elseif ($_SESSION['adm'] == 'NAO'){
  header("Location: index_logado_serv.php");
  die();
}

$sql = "SELECT * FROM serv_log ORDER BY id_serv ASC";
  try {
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
      // Execução da SQL Ok!!
      $servidores = $stmt->fetchAll();
    }
    else {
      die("Falha ao executar a SQL.. #2");
    }

  } catch (PDOException $e) {
    die($e->getMessage());
  }
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Administração</title>
      <!-- Icon Google -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
      <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- CSS -->
          <link rel="stylesheet" href="css/index_logado_adm.css">
  </head>
  <body class="wallpaper">
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

      <header class="hdr"> <!-- Cabeçalho / Menu -->
        <figure class="logo">
            <img src="img/logo.png">
        </figure>
                
          <nav class="menu"> <!--Menu-->
              <div class="packge-menu">
                  <section class="pack-menu">
                      <a href="tabela_adm.php"><p type="button">Escala</p></a>
                      <a href="cad_serv.php"><p type="button">Cadastro</p></a>
                      <a href="list_esp.php" class="">Especialidades</a>
                      <a href="sobre.php"><p type="button" >Sobre</p></a>
                      <!--p><i><?//php echo $_SESSION['nome']; ?></i> - Conectado</p-->
                      <a href="Logout.php" class="link-login"><button type="login">Sair</button></a>
                  </section>
              </div>
          </nav>
      </header>

    <main>
    <div class="packege-tab">
      <h1>Gerenciar Servidor</h1>
         
      <?php if (!empty($servidores)) { ?>
        <!-- Aqui que será montada a tabela com a relação de servidores!! -->
        
        <div class="pack-tab">
            <table class="table table-hover"> <!-- Tabela referente ao manter Cadastro de servidor -->
              <thead> <!-- Cabeçalho -->
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Matricula</th>
                  <th scope="col">Email</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
            <tbody>
              <?php foreach ($servidores as $s) { ?>
                <tr>
                  <th scope="row"><?php echo $s['id_serv']; ?></th>
                  <td><?php echo $s['nome']; ?></td>
                  <td><?php echo $s['cpf']; ?></td>
                  <td><?php echo $s['matricula']; ?></td>
                  <td><?php echo $s['email']; ?></td>
                  <td>
                    <div class="icons-acao">
                      <div class="btn-edit">
                          <a href="alt_serv.php?id_serv=<?php echo $s['id_serv']; ?>"><span class="material-symbols-outlined icon-edit">edit</span></a>
                      </div>
                      <div class="btn-del">
                          <a href="del_serv.php?id_serv=<?php echo $s['id_serv']; ?>"><span class="material-symbols-outlined icon-del">delete</span></a>
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