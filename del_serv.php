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

// Verificar se está chegando a informação (id_serv) pelo $_GET
if (!empty($_GET['id_serv'])) {

  // Buscar as informações do servidor a ser deletado (no banco de dados)
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
    //die($e->getMessage());
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
    <meta charset="utf-8">
    <title>Pagina de delte servidor</title>
  </head>
  <body>
    <h1>Apagar Servidor</h1>

    <form action="processa_serv.php" method="post">

        <label for="id_serv">ID</label>
        <input type="text" class="" name="id_serv" id="id_anuncio" value="<?php echo $result['id_serv']; ?>" readonly>
        
        <br><br>

        <label for="nome">Nome</label>
        <input type="text" class="" name="nome" id="nome" value="<?php echo $result['nome']; ?>" readonly>

        <br><br>

        <label for="cpf">CPF</label>
        <input type="text" class="" name="cpf" id="cpf" value="<?php echo $result['cpf']; ?>" readonly>

        <br><br>

        <label for="cpf">Matricula</label>
        <input type="text" class="" name="matricula" id="matricula" value="<?php echo $result['matricula']; ?>" readonly>

        <br><br>

        <label for="email">Email</label>
        <input type="text" class="" name="email" id="email" value="<?php echo $result['email']; ?>" readonly>

        <br><br>

        <label for="senha">Senha</label>
        <input type="password" class="" name="senha" id="senha" value="<?php echo $result['senha']; ?>" readonly>

        <br><br>

        <button type="submit" name="enviarDados" class="" value="DEL">Apagar</button>
        <a href="index_logado.php" class="">Cancelar</a>

    </form>
  </body>
</html>