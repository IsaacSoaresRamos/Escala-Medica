<?php
require_once 'Conexao.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
    // Preparar as informações
      // Montar a SQL (pgsql)
      $sql = "INSERT INTO serv_log
                (nome, cpf, matricula, email, senha)
              VALUES
                (:nome, :cpf, :matricula, :email, :senha)";

      // Preparar a SQL (pdo)
      $stmt = $pdo->prepare($sql);

      // Definir/organizar os dados p/ SQL
      $dados = array(
        ':nome' => $_POST['nome'],
        ':cpf' => $_POST['cpf'],
        ':matricula' => $_POST['matricula'],
        ':email' => $_POST['email'],
        ':senha' => sha1($_POST['senha'])
      );

      // Tentar Executar a SQL (INSERT)
      // Realizar a inserção das informações no BD (com o PHP)
      if ($stmt->execute($dados)) {
        header("Location: index.php?msgSucesso=Cadastro realizado com sucesso!");
      }
  } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: index.php?msgErro=Falha ao cadastrar...");
  }
}
else {
  header("Location: index.php?msgErro=Erro de acesso.");
}
die();

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
 ?>