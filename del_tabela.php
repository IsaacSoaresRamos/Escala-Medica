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

    // Verificar se o usuário logado pode acessar/alterar as informações desse registro (id_tabela)
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
    <title>Pagina de delete dos dados da Tabela</title>
  </head>
  <body>
    <h1>Apagar dados da Tabela</h1>

    <form action="processa_tabela.php" method="post">

        <label for="servidor">ID do Servidor</label>
        <input type="text" class="" name="servidor" id="servidor" value="<?php echo $result['id_serv']; ?>" readonly>
        
        <br><br>

        <label for="especialidade">ID da Especialidade</label>
        <input type="text" class="" name="especialidade" id="especialidade" value="<?php echo $result['id_esp']; ?>" readonly>
        
        <br><br>

        <label for="sd">SD - Servico Diurno</label>
        <input type="checkbox" class="" name="sd" id="sd" value="<?php echo $result['sd']; ?>" readonly>

        <br><br>

        <label for="sv">SV - Servico Vespertino</label>
        <input type="checkbox" class="" name="sv" id="sv" value="<?php echo $result['sv']; ?>" readonly>

        <br><br>

        <label for="lc">LC - Licenca ou Atestado Medico</label>
        <input type="checkbox" class="" name="lc" id="lc" value="<?php echo $result['lc']; ?>" readonly>

        <br><br>

        <label for="lp">LP - Licenca Premio</label>
        <input type="checkbox" class="" name="lp" id="lp" value="<?php echo $result['lp']; ?>" readonly>

        <br><br>

        <label for="lm">LM - Licenca Maternidade</label>
        <input type="checkbox" class="" name="lm" id="lm" value="<?php echo $result['lm']; ?>" readonly>

        <br><br>

        <label for="sha">SHA - Saldo de Horas Anteriores</label>
        <input type="text" class="" name="sha" id="sha" value="<?php echo $result['sha']; ?>" readonly>
        
        <br><br>

        <label for="fe">FE - Ferias</label>
        <input type="text" class="" name="fe" id="fe" value="<?php echo $result['fe']; ?>" readonly>
        
        <br><br>
        
        <label for="f">F - Folga</label>
        <input type="text" class="" name="f" id="f" value="<?php echo $result['f']; ?>" readonly>
        
        <br><br>

        <label for="shm">SHM - Saldo de Horas no Mes</label>
        <input type="text" class="" name="shm" id="shm" value="<?php echo $result['shm']; ?>" readonly>
        
        <br><br>

        <label for="hd">/ - 8 horas diarias</label>
        <input type="text" class="" name="hd" id="hd" value="<?php echo $result['hd']; ?>" readonly>
        
        <br><br>

        <label for="cht">CHT - Carga Horaria Trabalhada</label>
        <input type="text" class="" name="cht" id="cht" value="<?php echo $result['cht']; ?>" readonly>
        
        <br><br>

        <label for="sht">SHT - Saldo de Horas Total</label>
        <input type="text" class="" name="sht" id="sht" value="<?php echo $result['sht']; ?>" readonly>
        
        <br><br>

        <label for="chm">CHM - Carga Horaria do Mes</label>
        <input type="text" class="" name="chm" id="chm" value="<?php echo $result['chm']; ?>" readonly>
        
        <br><br>

        <button type="submit" name="enviarDados" class="" value="DEL">Apagar</button>
        <a href="index_logado.php" class="">Cancelar</a>

    </form>
  </body>
</html>