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
    <meta charset="utf-8">
    <title>Página Inicial - Ambiente Logado</title>
  </head>
  <body>
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

    <div>
      <a href="Logout.php" class="">Sair</a>
    </div>
    
    <h2>Olá <i><?php echo $_SESSION['nome']; ?></i>, seja bem-vindo(a)!</h2>
    
    <div>
      <a href="list_esp.php" class="">Listar Especialidades</a>
    </div>
    <div>
      <a href="tabela_adm.php" class="">Escala Medica</a>
    </div>

    <h3>Listagem de servidores</h3>
    
    <a href="cad_serv.php" class="">Cadastrar Servidor</a>

    <?php if (!empty($servidores)) { ?>
      <!-- Aqui que será montada a tabela com a relação de servidores!! -->

      
      <br><br>
      
      <table>
          <thead> 
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">Matricula</th>
              <th scope="col">Email</th>
              <th scope="col">Ações</th>
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
                    <a href="alt_serv.php?id_serv=<?php echo $s['id_serv']; ?>">Alterar</a>
                    <a href="del_serv.php?id_serv=<?php echo $s['id_serv']; ?>">Excluir</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
  </body>
</html>