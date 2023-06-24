<?php 
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

//if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  //header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  //die();
//}elseif ($_SESSION['adm'] == 'NAO'){
  //  header("Location: index_logado_serv.php?msgErro=Você não tem permição de acessar essa pagina");
    //die();
 // }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Especialidade</title>
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/cad_tabela.css">
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
            <div class="containe">
                <h1>Cadastrar Dados</h1>
                <section class="container-form">
                    <form action="processa_tabela.php" method="post">
                        <div class="containI">
                            <div class="lineI">
                                <label for="id_serv" style="margin-left: 3.5rem;">ID Servidor</label><br>
                                <input type="text" name="id_serv" id="id_serv" class="">
                            </div>
                            <div class="lineII">
                            <label for="id_esp" style="margin-left: 2.5rem;">ID Especialidade</label><br>
                            <input type="text" name="id_esp" id="id_esp" class="">
                            </div>
                        </div>
                        <label for="sd">SD - Servico Diurno</label>
                        <select class="form-select" name="sd" id="sd">
                            <option selected>Selecione o Valor </option>
                            <option value="true">Sim</option>
                            <option value="false">Não</option>
                        </select>
                        <br>
                        <label for="sv">SV - Servico Vespertino</label>
                        <select class="form-select" name="sv" id="sv">
                            <option selected>Selecione o Valor </option>
                            <option value="true">Sim</option>
                            <option value="false">Não</option>
                        </select>
                        <br>
                        <label for="lc">LC - Licenca ou Atestado Medico</label>
                        <select class="form-select" name="lc" id="lc">
                            <option selected>Selecione o Valor </option>
                            <option value="true">Sim</option>
                            <option value="false">Não</option>
                        </select>
                        <br>
                        <label for="lp">LP - Licenca Premio</label>
                        <select class="form-select" name="lp" id="lp">
                            <option selected>Selecione o Valor </option>
                            <option value="true">Sim</option>
                            <option value="false">Não</option>
                        </select>
                        <br>
                        <label for="lm">LM - Licenca Maternidade</label>
                        <select class="form-select" name="lm" id="lm">
                            <option selected>Selecione o Valor </option>
                            <option value="true">Sim</option>
                            <option value="false">Não</option>
                        </select>
                        <br>
                        <label for="sha">SHA - Saldo de Horas Anteriores</label>
                        <input type="text" name="sha" id="sha" class="">
                        <br>
                        <label for="fe">FE - Ferias</label>
                        <input type="text" name="fe" id="fe" class="">
                        <br>
                        <label for="f">F - Folga</label>
                        <input type="text" name="f" id="f" class="">
                        <br>
                        <label for="shm">SHM - Saldo de Horas no Mes</label>
                        <input type="text" name="shm" id="shm" class="">
                        <br>
                        <label for="hd">/ - 8 Horas Diarias</label>
                        <input type="text" name="hd" id="hd" class="">
                        <br>
                        <label for="cht">CHT - Carga Horaria Trabalhada</label>
                        <input type="text" name="cht" id="cht" class="">
                        <br>
                        <label for="sht">SHT - Saldo de Horas Total</label>
                        <input type="text" name="sht" id="sht" class="">
                        <br>
                        <label for="chm">CHM - Carga Horaria do Mes</label>
                        <input type="text" name="chm" id="chm" class="">
                        <br>
                        <button type="submit" name="enviarTabela" value="CAD" class="">Cadastrar</button>
                        <a href="tabela_adm.php" class="">Cancelar</a>
                    </section>
                </form>
            </div>
        </main>
    </body>
</html>