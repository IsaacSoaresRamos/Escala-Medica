<?php
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}
$result = array();

// Verificar se está chegando a informação (id_esp) pelo $_GET
if (!empty($_GET['id_esp'])) {

  // Buscar as informações da especialidade a ser deletado (no banco de dados)
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
    //die($e->getMessage());
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
    <meta charset="utf-8">
    <title>Pagina de delte especialidade</title>
  </head>
  <body>
    <h1>Apagar Especialidade</h1>

    <form action="processa_esp.php" method="post">

        <label for="id_esp">ID</label>
        <input type="text" class="" name="id_esp" id="id_anuncio" value="<?php echo $result['id_esp']; ?>" readonly>
        
        <br><br>

        <label for="esp">Especialidade</label>
        <input type="text" class="" name="esp" id="esp" value="<?php echo $result['esp']; ?>" readonly>

        <br><br>

        <button type="submit" name="enviarDados" class="" value="DEL">Apagar</button>
        <a href="list_esp.php" class="">Cancelar</a>

    </form>
  </body>
</html>