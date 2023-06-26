<?php
require_once 'Conexao.php';

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}elseif ($_SESSION['adm'] == 'NAO'){
  header("Location: index_logado_serv.php?msgErro=Você não tem permição de acessar essa pagina");
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

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Escala</title>
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/del_tabela.css">
</head>
  <body class="wallpaper"> 
    <header class="hdr"> <!--Cabeçalho-->
        <figure class="logo">
            <img src="img/logo.png">
        </figure>
               
        <nav class="menu"> <!--Menu-->
            <div class="packge-menu">
                <section class="pack-menu">
                    <a href="tabela_adm.php"><p type="button" >Escala</p></a>
                    <a href="index_logado_adm.php"><p type="button">Gerenciamento</p></a>
                    <a href="sobre.php"><p type="button" >Sobre</p></a>
                    <a href="Logout.php" class="link-login"><button type="login">Sair</button></a>
                </section>
            </div>
        </nav>
    </header>

    <main>
      <div class="containe-del">
        <header>
        <h1>Atenção!</h1>
          <section class="container-form-del">
            <div class="texto-atencao">
              <h2>Deseja realmente excluir está tabela?</h2>
            </div>
            <form action="processa_tabela.php" method="post">
              <section>
                    <label for="id_tabela"></label>
                    <input type="hidden" class="tab-id" name="id_tabela" id="id_tabela" value="<?php echo $result['id_tabela']; ?>" readonly>
                <div class="lineI"><!--1º linha-->
                  <div class="btn-serv"> 
                    <label for ="id_serv" style="margin-left: 4rem;">ID Servidor</label><br>
                    <input type="text" name="id_serv" id="id_serv" value="<?php echo $result['id_serv']; ?>" readonly>
                  </div>
                  <div class="btn-esp"> 
                    <label for="id_esp" style="margin-left: 2.5rem;">ID Especialidade</label><br>
                    <input type="text" class="" name="id_esp" id="id_esp" value="<?php echo $result['id_esp']; ?>" readonly>
                  </div>
                </div>

                <div class="btn-edit-del"> <!-- Botão Cadastrar/Cancelar --> 
                  <button type="submit" name="enviarTabela" class="del" value="DEL">Excluir</button>
                  <button class="btn-del"><a href="tabela_adm.php">Cancelar</a></button>
                </div>
              </section>
            </form>
          </section>

        <!--div>
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
        </div-->

      </form>
    </div>
  </body>
</html>