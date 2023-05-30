<?php
require_once 'Conexao.php';

session_start();

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}

/*
echo "Estou logado";
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
die();
*/
$sql = "SELECT * FROM serv_log ORDER BY id_serv ASC";
  try {
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
      // Execução da SQL Ok!!
      $servidores = $stmt->fetchAll();

      /*
      echo '<pre>';
      print_r($servidores);
      echo '</pre>';
      die();
      */
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

    <h3>Listagem de servidores</h3>
    <?php if (!empty($servidores)) { ?>
      <!-- Aqui que será montada a tabela com a relação de anúncios!! -->

      <a href="cad_serv.php" class="">Cadastrar Servidor</a>
      
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