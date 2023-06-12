<?php
require_once 'Conexao.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

session_start();

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
die();
*/
/*
if ($_POST['sd'] == 'on') {
  // O checkbox foi marcado
  $sd = true;
} else {
  // O checkbox não foi marcado
  $sd = false;
}

if ($_POST['sv'] == 'on') {
  // O checkbox foi marcado
  $sv = true;
} else {
  // O checkbox não foi marcado
  $sv = false;
}

if ($_POST['lc'] == 'on') {
  // O checkbox foi marcado
  $lc = true;
} else {
  // O checkbox não foi marcado
  $lc = false;
}

if ($_POST['lp'] == 'on') {
  // O checkbox foi marcado
  $lp = true;
} else {
  // O checkbox não foi marcado
  $lp = false;
}

if ($_POST['lm'] == 'on') {
  // O checkbox foi marcado
  $lm = true;
} else {
  // O checkbox não foi marcado
  $lm = false;
}
*/
if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  // Verificar se estou tentando INSERIR (CAD) / ALTERAR (ALT) / EXCLUIR (DEL)
  if ($_POST['enviarDados'] == 'ALT') { // CADASTRAR!!!
    
    try {
      $sql = "UPDATE
                tabela
              SET
                id_serv = :id_serv,
                id_esp = :id_esp,
                sd = :sd,
                sv = :sv,
                lc = :lc
                lp = :lp,
                lm = :lm,
                sha = :sha,
                fe = :fe,
                f = :f
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

      $stmt = $pdo->prepare($sql);

      // Executar SQL
      if ($stmt->execute($dados)) {
        header("Location: tabela.php?msgSucesso=Alteração realizada com sucesso!!");
      }
      else {
        header("Location: tabela.php?msgErro=Falha ao ALTERAR tabela..");
      }
    } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: tabela.php?msgErro=Falha ao ALTERAR tabela..");
    }
  }
  elseif ($_POST['enviarDados'] == 'DEL') { // EXCLUIR!!!
    /** Implementação do excluir aqui.. */
    // id_anuncio ok
    // e-mail usuário logado ok
    try {
      $sql = "DELETE FROM tabela WHERE id_tabela = :id_tabela";
      $stmt = $pdo->prepare($sql);

      $dados = array(':id_tabela' => $_POST['id_tabela']);

      if ($stmt->execute($dados)) {
        header("Location: tabela.php?msgSucesso=Tabela excluída com sucesso!!");
      }
      else {
        header("Location: tabela.php?msgSucesso=Falha ao EXCLUIR tabela..");
      }
    } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: tabela.php?msgSucesso=Falha ao EXCLUIR tabela..");
    }
  }
    elseif ($_POST['enviarDados'] == 'CAD') { // Cadastrar!!!
 /*   
      echo '<pre>';
print_r($_POST);
echo '</pre>';
die();
*/
      try {
          $sql = "INSERT INTO tabela
                    (id_serv, id_esp, sd, sv, lc, lp, lm, sha, fe, f, hd, shm, cht, sht, chm)
                  VALUES
                    (:id_serv, :id_esp, :sd, :sv, :lc, :lp, :lm, :sha, :fe, :f, :hd, :shm, :cht, :sht, :chm)";
    
          // Preparar a SQL (pdo)
          $stmt = $pdo->prepare($sql);
    
          // Definir/organizar os dados p/ SQL
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
            ':hd' => $_POST['hd'],
            ':shm' => $_POST['shm'],
            ':cht' => $_POST['cht'],
            ':sht' => $_POST['sht'],
            ':chm' => $_POST['chm']

          );
    
          // Tentar Executar a SQL (INSERT)
          // Realizar a inserção das informações no BD (com o PHP)
          if ($stmt->execute($dados)) {
            header("Location: tabela.php?msgSucesso=Cadastro realizado com sucesso!");
          }
      } catch (PDOException $e) {
          //die($e->getMessage());
          header("Location: tabela.php?msgErro=Falha ao cadastrar...");
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