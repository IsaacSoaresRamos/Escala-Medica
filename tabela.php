<?php
require_once 'Conexao.php';

session_start();

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}

$sql = "SELECT * FROM tabela ORDER BY id_tabela ASC";
  try {
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
      // Execução da SQL Ok!!
      $tabela = $stmt->fetchAll();
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
    <title>Tabela</title>
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
    
    <h2>Você está na Tabela de Escala Medica!</h2>

    <h3>Listagem de tabela</h3>
    <?php if (!empty($tabela)) { ?>
      <!-- Aqui que será montada a tabela com a relação de anúncios!! -->

      <a href="cad_tabela.html" class="">Cadastrar dados na Tabela</a>
      
      <br><br>
      
      <table>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID Servidor</th>
              <th scope="col">Id Especialidade</th>
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
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tabela as $t) { ?>
              <tr>
                <th scope="row"><?php echo $t['id_tabela']; ?></th>
                <td><?php echo $t['id_serv']; ?></td>
                <td><?php echo $t['id_esp']; ?></td>
                <td><?php echo $t['sd']; ?></td>
                <td><?php echo $t['sv']; ?></td>
                <td><?php echo $t['lc']; ?></td>
                <td><?php echo $t['lp']; ?></td>
                <td><?php echo $t['lm']; ?></td>
                <td><?php echo $t['sha']; ?></td>
                <td><?php echo $t['fe']; ?></td>
                <td><?php echo $t['f']; ?></td>
                <td><?php echo $t['shm']; ?></td>
                <td><?php echo $t['hd']; ?></td>
                <td><?php echo $t['cht']; ?></td>
                <td><?php echo $t['sht']; ?></td>
                <td><?php echo $t['chm']; ?></td>
                <td>
                    <a href="alt_tabela.php?id_tabela=<?php echo $t['id_tabela']; ?>">Alterar</a>
                    <a href="del_tabela.php?id_tabela=<?php echo $t['id_tabela']; ?>">Excluir</a>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
  </body>
</html>