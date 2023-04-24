<?php
require_once 'conexao.php';
// Conectar ao BD (com o PHP)
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
die();
*/

// Verificar se está chegando dados por POST
if (!empty($_POST)) {
  // Iniciar SESSAO (session_start)
  session_start();
  try {
    // Montar a SQL
    $sql = "SELECT * FROM servidor WHERE matricula = :matricula AND senha = :senha";

    // Preparar a SQL (pdo)
    $stmt = $pdo->prepare($sql);

    // Definir/Organizar os dados p/ SQL
    $dados = array(
      ':matricula' => $_POST['matricula'],
      ':senha' => sha1($_POST['senha'])
    );

    $stmt->execute($dados);
    //$stmt->execute(array(':email' => $_POST['email'], ':senha' => $_POST['senha']));

    $result = $stmt->fetchAll();

    if ($stmt->rowCount() == 1) { // Se o resultado da consulta SQL trouxer um registro
      // Autenticação foi realizada com sucesso

      $result = $result[0];
      // Definir as variáveis de sessão
      $_SESSION['nome'] = $result['nome'];
      $_SESSION['cpf'] = $result['cpf'];
      $_SESSION['email'] = $result['email'];
      $_SESSION['matricula'] = $result['matricula'];
      $_SESSION['cargo'] = $result['cargo'];
      $_SESSION['senha'] = $result['senha'];
      $_SESSION['statu'] = $result['statu'];

      // Redirecionar p/ página inicial (ambiente logado)
      header("Location: dashboard.php");

    } else { // Signifca que o resultado da consulta SQL não trouxe nenhum registro
      // Falha na autenticaçao
      // Destruir a SESSAO
      session_destroy();
      // Redirecionar p/ página inicial (login)
      header("Location: login.php");
    }
  } catch (PDOException $e) {
    die();
  }
}
else {
  header("Location: editar.php");
}
die();
?>