<?php
require_once 'Conexao.php';

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}

$result = array();

// Verificar se está chegando a informação (id_tabela) pelo $_GET
if (!empty($_GET['id_tabela'])) {

    // Buscar as informações do anúncio a ser alterado (no banco de dados)
  $sql = "SELECT * FROM tabela WHERE id_tabela = :id_tabela";
  try {
    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(':id_tabela' => $_GET['id_tabela']));

    if ($stmt->rowCount() == 1) {
      // Registro obtido no banco de dados
      $result = $stmt->fetchAll();
      $result = $result[0]; // Informações do registro a ser alterado

      /*
      echo '<pre>';
      print_r($result);
      echo '</pre>';
      */
      //die();

    }
    else {
      //die("Não foi encontrado nenhum registro para id_tabela = " . $_GET['id_tabela']);
      header("Location: tabela.php?msgErro=Você não tem permissão para acessar esta página");
      die();
    }

  } catch (PDOException $e) {
    header("Location: tabela.php?msgErro=Falha ao obter registro no banco de dados.");
    //die($e->getMessage());
  }
}
else {
  // Se entrar aqui, significa que $_GET['id_tabela'] está vazio
  header("Location: tabela.php?msgErro=Você não tem permissão para acessar esta página");
  die();
}

  // Redirecionar (permissão)

?>

<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Apagar Escala</title>
  </head>
  <body>
    <div class="container">
      <h1>Apagar Escala</h1>
      <form action="processa_tabela.php" method="post">
        
      
      <label for="id_tabela">ID</label>
      <input type="text" class="" name="id_tabela" id="id_tabela" value="<?php echo $result['id_tabela']; ?>" readonly>

        <div class="col-4">
          <label for="id_serv">ID do Servidor</label>
          <input type="text" class="" name="id_serv" id="id_serv" value="<?php echo $result['id_serv']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="id_esp">ID da Especialidade</label>
          <input type="text" class="" name="id_esp" id="id_esp" value="<?php echo $result['id_esp']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="sd">SD - Servico Diurno</label>
          <select class="form-select" name="sd" id="sd">
            <option>Selecione o valor</option>
            <option value="true" <?php echo $result['sd'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['sd'] == false ? "selected" : "" ?>>Não</option>
          </select>
        </div>

        <div class="col-4">
          <label for="sv">SV - Servico Vespertino</label>
          <select class="form-select" name="sv" id="sv">
            <option>Selecione o valor</option>
            <option value="true" <?php echo $result['sv'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['sv'] == false ? "selected" : "" ?>>Não</option>
          </select>
        </div>

        <div class="col-4">
          <label for="lc">LC - Licenca ou Atestado Medico</label>
          <select class="form-select" name="lc" id="lc">
            <option>Selecione o valor</option>
            <option value="true" <?php echo $result['lc'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['lc'] == false ? "selected" : "" ?>>Não</option>
          </select>
        </div>

        <div class="col-4">
          <label for="lp">LP - Licenca Premio</label>
          <select class="form-select" name="lp" id="lp">
            <option>Selecione o valor</option>
            <option value="true" <?php echo $result['lp'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['lp'] == false ? "selected" : "" ?>>Não</option>
          </select>
        </div>

        <div class="col-4">
          <label for="lm">LM - Licenca Maternidade</label>
          <select class="form-select" name="lm" id="lm">
            <option>Selecione o valor</option>
            <option value="true" <?php echo $result['lm'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['lm'] == false ? "selected" : "" ?>>Não</option>
          </select>
        </div>

        <div class="col-4">
          <label for="sha">SHA - Saldo de Horas Anteriores</label>
          <input type="text" name="sha" id="sha" class="" value="<?php echo $result['sha']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="fe">FE - Ferias</label>
          <input type="text" name="fe" id="fe" class="" value="<?php echo $result['fe']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="f">F - Folga</label>
          <input type="text" name="f" id="f" class="" value="<?php echo $result['f']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="shm">SHM - Saldo de Horas no Mes</label>
          <input type="text" name="shm" id="shm" class="" value="<?php echo $result['shm']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="hd">/ - 8 Horas Diarias</label>
          <input type="text" name="hd" id="hd" class="" value="<?php echo $result['hd']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="cht">CHT - Carga Horaria Trabalhada</label>
          <input type="text" name="cht" id="cht" class="" value="<?php echo $result['cht']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="sht">SHT - Saldo de Horas Total</label>
          <input type="text" name="sht" id="sht" class="" value="<?php echo $result['sht']; ?>" readonly>
        </div>

        <div class="col-4">
          <label for="chm">CHM - Carga Horaria do Mes</label>
          <input type="text" name="chm" id="chm" class="" value="<?php echo $result['chm']; ?>" readonly>
        </div>

        <br />

        <button type="submit" name="enviarTabela" class="btn btn-primary" value="DEL">Apagar</button>
        <a href="tabela.php" class="btn btn-danger">Cancelar</a>

      </form>
    </div>
  </body>
</html>