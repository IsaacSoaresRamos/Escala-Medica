<?php
require_once 'Conexao.php';

session_start();

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

    // Verificar se o usuário logado pode acessar/alterar as informações desse registro (id_serv)
    if ($stmt->rowCount() == 1) {
      // Registro obtido no banco de dados
      $result = $stmt->fetchAll();
      $result = $result[0]; // Informações do registro a ser alterado
    }
    else {
      header("Location: tabela.php");
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

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagina de alterar dados da Tabela</title>
  </head>
  <body>
    <h1>Alterar dados da Tabela</h1>

    <form action="processa_tabela.php" method="post">

        <label for="servidor">ID do Servidor</label>
        <input type="text" class="" name="servidor" id="servidor" value="<?php echo $result['id_serv']; ?>" readonly>
        
        <br><br>

        <label for="especialidade">ID da Especialidade</label>
        <input type="text" class="" name="especialidade" id="especialidade" value="<?php echo $result['id_esp']; ?>" readonly>
        
        <br><br>

        <label for="sd">SD - Servico Diurno</label>
          <select class="" name="sd" id="sd">
            <option selected>Selecione o valor</option>
            <option value="true" <?php echo $result['sd'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['sd'] == false ? "selected" : "" ?>>Não</option>
          </select>

        <br><br>

        <label for="sv">SV - Servico Vespertino</label>
        <select class="" name="sv" id="sv">
            <option selected>Selecione o valor</option>
            <option value="true" <?php echo $result['sv'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['sv'] == false ? "selected" : "" ?>>Não</option>
          </select>

        <br><br>

        <label for="lc">LC - Licenca ou Atestado Medico</label>
        <select class="" name="lc" id="lc">
            <option selected>Selecione o valor</option>
            <option value="true" <?php echo $result['lc'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['lc'] == false ? "selected" : "" ?>>Não</option>
          </select>

        <br><br>

        <label for="lp">LP - Licenca Premio</label>
        <select class="" name="lp" id="lp">
            <option selected>Selecione o valor</option>
            <option value="true" <?php echo $result['lp'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['lp'] == false ? "selected" : "" ?>>Não</option>
          </select>

        <br><br>

        <label for="lm">LM - Licenca Maternidade</label>
        <select class="" name="lm" id="lm">
            <option selected>Selecione o valor</option>
            <option value="true" <?php echo $result['lm'] == true ? "selected" : "" ?>>Sim</option>
            <option value="false" <?php echo $result['lm'] == false ? "selected" : "" ?>>Não</option>
          </select>

        <br><br>

        <label for="sha">SHA - Saldo de Horas Anteriores</label>
        <input type="text" class="" name="sha" id="sha" value="<?php echo $result['sha']; ?>" >
        
        <br><br>

        <label for="fe">FE - Ferias</label>
        <input type="text" class="" name="fe" id="fe" value="<?php echo $result['fe']; ?>" >
        
        <br><br>
        
        <label for="f">F - Folga</label>
        <input type="text" class="" name="f" id="f" value="<?php echo $result['f']; ?>" >
        
        <br><br>

        <label for="shm">SHM - Saldo de Horas no Mes</label>
        <input type="text" class="" name="shm" id="shm" value="<?php echo $result['shm']; ?>" >
        
        <br><br>

        <label for="hd">/ - 8 horas diarias</label>
        <input type="text" class="" name="hd" id="hd" value="<?php echo $result['hd']; ?>" >
        
        <br><br>

        <label for="cht">CHT - Carga Horaria Trabalhada</label>
        <input type="text" class="" name="cht" id="cht" value="<?php echo $result['cht']; ?>" >
        
        <br><br>

        <label for="sht">SHT - Saldo de Horas Total</label>
        <input type="text" class="" name="sht" id="sht" value="<?php echo $result['sht']; ?>" >
        
        <br><br>

        <label for="chm">CHM - Carga Horaria do Mes</label>
        <input type="text" class="" name="chm" id="chm" value="<?php echo $result['chm']; ?>" >
        
        <br><br>

        <button type="submit" name="enviarDados" class="" value="ALT">Alterar</button>
        <a href="index_logado.php" class="">Cancelar</a>

    </form>
  </body>
</html>