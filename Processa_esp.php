
<?php
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}
?>

<?php

 if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  // Verificar se estou tentando INSERIR (CAD) / ALTERAR (ALT) / EXCLUIR (DEL)
  if ($_POST['enviarDados'] == 'ALT') { // ALTERAR!!!
    
    try {
      $sql = "UPDATE
                especialidade
              SET
                esp = :esp
              WHERE
                id_esp = :id_esp";

      // Definir dados para SQL
      $dados = array(
        ':id_esp' => $_POST['id_esp'],
        ':esp' => $_POST['esp']
      );

      $stmt = $pdo->prepare($sql);

      // Executar SQL
      if ($stmt->execute($dados)) {
        header("Location: list_esp.php?msgSucesso=Alteração realizada com sucesso!!");
      }
      else {
        header("Location: list_esp.php?msgErro=Falha ao ALTERAR especialidade..");
      }
    } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: list_esp.php?msgErro=Falha ao ALTERAR especialidade..");
    }
  }
  elseif ($_POST['enviarDados'] == 'DEL') { // EXCLUIR!!!

    try {
      $sql = "DELETE FROM especialidade WHERE id_esp = :id_esp";
      $stmt = $pdo->prepare($sql);

      $dados = array(':id_esp' => $_POST['id_esp']);

      if ($stmt->execute($dados)) {
        header("Location: list_esp.php?msgSucesso=Especialidade excluído com sucesso!!");
      }
      else {
        header("Location: list_esp.php?msgSucesso=Falha ao EXCLUIR especialidade..");
      }
    } catch (PDOException $e) {
      header("Location: list_esp.php?msgSucesso=Falha ao EXCLUIR especialidade..");
    }
  }
  elseif ($_POST['enviarDados'] == 'CAD') { // Cadastrar!!!
    
    try {
        $sql = "INSERT INTO especialidade
                  (esp)
                VALUES
                  (:esp)";
  
        // Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);
  
        // Definir/organizar os dados p/ SQL
        $dados = array(
          ':esp' => $_POST['esp']
        );
  
        // Tentar Executar a SQL (INSERT)
        // Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
          header("Location: list_esp.php?msgSucesso=Cadastro realizado com sucesso!");
        }
    } catch (PDOException $e) {
        //die($e->getMessage());
        header("Location: list_esp.php?msgErro=Falha ao cadastrar...");
    }
  }
  else {
    header("Location: list_esp.php?msgErro=Erro de acesso 1.");
  }
  }
  else {
    header("Location: list_esp.php?msgErro=Erro de acesso (Operação não definida).");
  }

die();

// Redirecionar para a página inicial (list_esp) c/ mensagem erro/sucesso
 ?>