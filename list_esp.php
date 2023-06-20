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
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lista de Especialidades</title>
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
      <a href="index_logado_adm.php" class="">Voltar</a>
    </div>
    <h3>Listagem de Espacialidades</h3>
    <?php if (!empty($esp)) { ?>
      <!-- Aqui que será montada a tabela com a relação de especialidades!! -->

      <a href="cad_esp.php" class="">Cadastrar Especialidade</a>
      
      <br><br>
      
      <table>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($esp as $s) { ?>
              <tr>
                <th scope="row"><?php echo $s['id_esp']; ?></th>
                <td><?php echo $s['esp']; ?></td>
                <td>
                    <a href="alt_esp.php?id_esp=<?php echo $s['id_esp']; ?>">Alterar</a>
                    <a href="del_esp.php?id_esp=<?php echo $s['id_esp']; ?>">Excluir</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
  </body>
</html>