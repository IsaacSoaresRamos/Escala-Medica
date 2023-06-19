<?php
require_once 'Conexao.php';
// Conectar ao BD (com o PHP)

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
  if ($_POST['enviarTabela'] == 'CAD') { // CADASTRAR!!!
    try {
      // Preparar as informações
        // Montar a SQL (pgsql)
        $sql = "INSERT INTO tabela
                  (id_serv, id_esp, sd, sv, lc, lp, lm, sha, fe, f, shm, hd, cht, sht, chm)
                VALUES
                  (:id_serv, :id_esp, :sd, :sv, :lc, :lp, :lm, :sha, :fe, :f, :shm, :hd, :cht, :sht, :chm)";

        // Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);

        // Definir os dados para SQL
        $dados = array(
          ':id_serv' => $_POST['id_serv'],
          ':id_esp' => $_POST['id_esp'],
          ':sd' => $_POST['sd'],
          ':sv' => $_POST['sv'],
          ':lc' => $_POST['lc'],
          ':lp' => $_POST['lp'],
          ':lm' => $_POST['lm'],
          ':sha' => $_POST['sha'],
          ':fe' => $_POST['fe'],
          ':f' => $_POST['f'],
          ':shm' => $_POST['shm'],
          ':hd' => $_POST['hd'],
          ':cht' => $_POST['cht'],
          ':sht' => $_POST['sht'],
          ':chm' => $_POST['chm']
        );

        // Tentar Executar a SQL (INSERT)
        // Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
          header("Location: tabela.php?msgSucesso=Escala cadastrado com sucesso!");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
        header("Location: tabela.php?msgErro=Falha ao cadastrar a escala..");
    }
  }
  elseif ($_POST['enviarTabela'] == 'ALT') { // ALTERAR!!!
    /* Implementação do update*/
    // Construir SQL para update
    try {
      $sql = "UPDATE
                tabela
              SET
                sd = :sd,
                sv = :sv,
                lc = :lc,
                lp = :lp,
                lm = :lm,
                sha = :sha,
                fe = :fe,
                f = :f,
                shm = :shm,
                hd = :hd,
                cht = :cht,
                sht = :sht,
                chm = :chm
              WHERE
                id_tabela = :id_tabela";

      // Definir dados para SQL
      $dados = array(
        ':id_tabela' => $_POST['id_tabela'],
        ':sd' => $_POST['sd'],
        ':sv' => $_POST['sv'],
        ':lc' => $_POST['lc'],
        ':lp' => $_POST['lp'],
        ':lm' => $_POST['lm'],
        ':sha' => $_POST['sha'],
        ':fe' => $_POST['fe'],
        ':f' => $_POST['f'],
        ':shm' => $_POST['shm'],
        ':hd' => $_POST['hd'],
        ':cht' => $_POST['cht'],
        ':sht' => $_POST['sht'],
        ':chm' => $_POST['chm']
      );

      $stmt = $pdo->prepare($sql);

      // Executar SQL
      if ($stmt->execute($dados)) {
        header("Location: tabela.php?msgSucesso=Alteração realizada com sucesso!!");
      }
      else {
        header("Location: tabela.php?msgErro=Falha ao ALTERAR escala..");
      }
    } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: tabela.php?msgErro=Falha ao ALTERAR escala..");
    }

  }
  elseif ($_POST['enviarTabela'] == 'DEL') { // EXCLUIR!!!
    /** Implementação do excluir aqui.. */
    // id_tabela ok
    try {
      $sql = "DELETE FROM tabela WHERE id_tabela = :id_tabela";
      $stmt = $pdo->prepare($sql);

      $dados = array(':id_tabela' => $_POST['id_tabela']);

      if ($stmt->execute($dados)) {
        header("Location: tabela.php?msgSucesso=Escala excluída com sucesso!!");
      }
      else {
        header("Location: tabela.php?msgSucesso=Falha ao EXCLUIR escala..");
      }
    } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: tabela.php?msgSucesso=Falha ao EXCLUIR escala..");
    }
  }
  else {
    header("Location: tabela.php?msgErro=Erro de acesso (Operação não definida).");
  }
}
else {
  header("Location: tabela.php?msgErro=Erro de acesso.");
}
die();

// Redirecionar para a página inicial (tabela) c/ mensagem erro/sucesso
 ?>