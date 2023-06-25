<?php
require_once 'Conexao.php';

session_start();//Inicia a seção

//if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  //header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  //die();
//}elseif ($_SESSION['adm'] == 'NAO'){
  //header("Location: index_logado_serv.php?msgErro=Você não tem permição de acessar essa pagina");
  //die();
//}

$sql = "SELECT t.id_tabela, t.sd, t.sv, t.lc, t.lp, t.lm, t.sha, t.fe, t.f, t.hd, t.shm, t.cht, t.sht, t.chm, t.id_serv, t.id_esp, serv.nome, esp.esp
        FROM tabela t
        INNER JOIN serv_log AS serv ON t.id_serv = serv.id_serv
        INNER JOIN especialidade AS esp ON t.id_esp = esp.id_esp 
        ORDER BY t.id_tabela ASC";
  try {
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
      // Execução da SQL Ok!!
      $tabelas = $stmt->fetchAll();
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
    <title>Escala.Net</title>
    <!-- Icon Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/tabela_adm.css">
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
                  <a href="index_logado_adm.php"><p type="button">Gerenciar Servidor</p></a>
                  <a href="#id_ancora"><p type="button">Legenda</p></a>
                  <a href="cad_tabela.php"><p type="button" >Nova Tabela</p></a>
                  <a href="Logout.php" class="link-login"><button type="login">Sair</button></a>
                </section>
            </div>
        </nav>
      </header>
      <main>
        <div class="titulo-table">
          <h1>Escala</h1>
        </div>
      <div class="container-table">
                        
        <?php if (!empty($tabelas)) { ?>
          <!-- Aqui que será montada a tabela com a relação de Escala!! -->
          <div class="container">
              <table class="table table-striped"><!--Tabela-->
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Servidor</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">SD</th>
                    <th scope="col">SV</th>
                    <th scope="col">LC</th>
                    <th scope="col">LP</th>
                    <th scope="col">LM</th>
                    <th scope="col">SHA</th>
                    <th scope="col">FE</th>
                    <th scope="col">F</th>
                    <th scope="col">SHM</th>
                    <th scope="col">/</th>
                    <th scope="col">CHT</th>
                    <th scope="col">SHT</th>
                    <th scope="col">CHM</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tabelas as $t) { ?>
                    <tr>
                      <th scope="row"><?php echo $t['id_tabela']; ?></th>
                      <td><?php echo $t['nome']; ?></td>
                      <td><?php echo $t['esp']; ?></td>
                      <td>
                        <?php
                          if ($t['sd'] == 'true') {
                            echo "Sim";
                          } else {
                            echo "Não";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($t['sv'] == 'true') {
                            echo "Sim";
                          } else {
                            echo "Não";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($t['lc'] == 'true') {
                            echo "Sim";
                          } else {
                            echo "Não";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($t['lp'] == 'true') {
                            echo "Sim";
                          } else {
                            echo "Não";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($t['lm'] == 'true') {
                            echo "Sim";
                          } else {
                            echo "Não";
                          }
                        ?>
                      </td>
                      <td><?php echo $t['sha']; ?></td>
                      <td><?php echo $t['fe']; ?></td>
                      <td><?php echo $t['f']; ?></td>
                      <td><?php echo $t['shm']; ?></td>
                      <td><?php echo $t['hd']; ?></td>
                      <td><?php echo $t['cht']; ?></td>
                      <td><?php echo $t['sht']; ?></td>
                      <td><?php echo $t['chm']; ?></td>
                      <td>
                        <div class="icons-acao">
                          <div class="btn-edit">
                              <a href="alt_tabela.php?id_tabela=<?php echo $t['id_tabela']; ?>"><span class="material-symbols-outlined icon-edit">edit</span></a>
                          </div>
                          <div class="btn-del">
                              <a href="del_tabela.php?id_tabela=<?php echo $t['id_tabela']; ?>"><span class="material-symbols-outlined icon-del">delete</span></a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php } ?>
          </div>
        </div>
      </main>
    <footer><!-- Legenda -->
               <section> 
                    <div class="container">
                         <h2 id="id_ancora">Legenda</h2>
                         <div class="container-tableI"> <!-- Tabela lado Esquerdo -->
                              <table class="table text-center">
                                   <thead><!--Titulo-->
                                        <tr>
                                             <th scope="col">Sigla</th>
                                             <th scope="col">Descrição</th>
                                        </tr>
                                   </thead>

                                   <tbody class="pack-tab-body"><!--Corpo-->
                                        <tr>
                                             <th scope="row">SD</th>
                                             <td>Serviço Diurno</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">SV</th>
                                             <td>Serviço Vespertino</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">SM</th>
                                             <td>Serviço Matutino</td>
                                        </tr>

                                        <tr>
                                             <th scope="row">LC</th>
                                             <td>Licença</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">LP</th>
                                             <td>Licença Prêmio</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">LM</th>
                                             <td>Licença Maternidade</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">SHA</th>
                                             <td>Saldo de Horas Anteriores</td>
                                        </tr>
                                   </tbody>
                              </table>
                         </div>

                         <div class="container-tableII"> <!-- Tabela lado Direito -->
                              <table class="table text-center">
                                   <thead><!--Titulo-->
                                        <tr>
                                             <th scope="col">Sigla</th>
                                             <th scope="col">Descrição</th>
                                        </tr>
                                   </thead>

                                   <tbody class="pack-tab-body"><!--Corpo-->
                                        <tr>
                                             <th scope="row">FE</th>
                                             <td>Férias</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">F</th>
                                             <td>Folga</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">SHM</th>
                                             <td>Saldo de Horas do Mês</td>
                                        </tr>

                                        <tr>
                                             <th scope="row">/</th>
                                             <td>8 horas Diárias</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">CHT</th>
                                             <td>Carga Horária Trabalhada</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">SHT</th>
                                             <td>Saldo de Horas Total</td>
                                        </tr>
                                        <tr>
                                             <th scope="row">CHM</th>
                                             <td>Carga Horária do Mês</td>
                                        </tr>
                                   </tbody>
                              </table>
                         </div>

                         <!-- Botão para voltar ao Topo-->
                         <a href="#"><button><span class="material-symbols-outlined">keyboard_double_arrow_up</span></button></a>
                    </div>
               </section>
          </footer>                    
  </body>
</html>