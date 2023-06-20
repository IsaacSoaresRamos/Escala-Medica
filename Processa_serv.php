<?php
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  // Verificar se estou tentando INSERIR (CAD) / ALTERAR (ALT) / EXCLUIR (DEL)
  if ($_POST['enviarDados'] == 'ALT') { // CADASTRAR!!!
    
    try {
      $sql = "UPDATE
                serv_log
              SET
                nome = :nome,
                cpf = :cpf,
                matricula = :matricula,
                email = :email,
                adm = :adm,
                senha = :senha
              WHERE
                id_serv = :id_serv";

      // Definir dados para SQL
      $dados = array(
        ':id_serv' => $_POST['id_serv'],
        ':nome' => $_POST['nome'],
        ':cpf' => $_POST['cpf'],
        ':matricula' => $_POST['matricula'],
        ':email' => $_POST['email'],
        ':adm' =>$_POST['adm'],
        ':senha' => sha1($_POST['senha'])
      );

      $stmt = $pdo->prepare($sql);

      // Executar SQL
      if ($stmt->execute($dados)) {
        header("Location: index_logado_adm.php?msgSucesso=Alteração realizada com sucesso!!");
      }
      else {
        header("Location: index_logado_adm.php?msgErro=Falha ao ALTERAR servidor..");
      }
    } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: index_logado_adm.php?msgErro=Falha ao ALTERAR servidor..");
    }
  }
  elseif ($_POST['enviarDados'] == 'DEL') { // EXCLUIR!!!

    try {
      $sql = "DELETE FROM serv_log WHERE id_serv = :id_serv";
      $stmt = $pdo->prepare($sql);

      $dados = array(':id_serv' => $_POST['id_serv']);
      $stmt -> bindParam(":id_serv", $_POST['id_serv']);

      if ($stmt->execute()) {
        header("Location: index_logado_adm.php?msgSucesso=Servidor excluído com sucesso!!");
      }
      else {
        header("Location: index_logado_adm.php?msgSucesso=Falha ao EXCLUIR servidor..");
      }
    } catch (PDOException $e) {
      header("Location: index_logado_adm.php?msgSucesso=Falha ao EXCLUIR servidor..");
    }
  }
  else {
    header("Location: index_logado_adm.php?msgErro=Erro de acesso (Operação não definida).");
  }
}
else {
  header("Location: index_logado_adm.php?msgErro=Erro de acesso.");
}
die();

// Redirecionar para a página inicial (index_logado) c/ mensagem erro/sucesso
 ?>