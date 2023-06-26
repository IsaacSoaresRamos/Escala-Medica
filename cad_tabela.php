<?php 
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

//if (empty($_SESSION)) {
    // Significa que as variáveis de SESSAO não foram definidas.
    // Não poderia acessar aqui.
//    header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
//    die();
//    } elseif ($_SESSION['adm'] == 'NAO'){
//    header("Location: index_logado_serv.php?msgErro=Você não tem permição de acessar essa pagina");
//    die();
//    }
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
                        <section>
                            <div class="lineI"><!--1º linha-->
                                <div class="btn-serv"> 
                                    <label for ="id_serv" style="margin-left: 4rem;">ID Servidor</label><br>
                                    <input type="text" name="id_serv" id ="id_serv">
                                </div>
                                <div class="btn-esp"> 
                                    <label for="id_esp" style="margin-left: 2.5rem;">ID Especialidade</label><br>
                                    <input type="text" name="id_esp" id="id_esp">
                                </div>
                            </div>

                            <div class="lineII"> <!--2º linha-->
                                <div class="btn-sd">
                                    <label for="sd">SD - Servico Diurno</label>
                                    <select class="form-select" name="sd" id="sd">
                                        <option selected>Selecione o Valor </option>
                                        <option value="true">Sim</option>
                                        <option value="false">Não</option>
                                    </select>
                                </div>
                                <div class="btn-sv">
                                    <label for="sv">SV - Servico Vespertino</label>
                                    <select class="form-select" name="sv" id="sv">
                                        <option selected>Selecione o Valor </option>
                                        <option value="true">Sim</option>
                                        <option value="false">Não</option>
                                    </select>
                                </div>
                                <div class="btn-lc">
                                    <label for="lc">LC - Licenca ou Atestado Medico</label>
                                    <select class="form-select" name="lc" id="lc">
                                        <option selected>Selecione o Valor </option>
                                        <option value="true">Sim</option>
                                        <option value="false">Não</option>
                                    </select>
                                </div>
                            <div>

                            <div class="lineIII"> <!--3º linha-->
                                <div class="btn-lp">
                                    <label for="lp">LP - Licenca Premio</label>
                                    <select class="form-select" name="lp" id="lp">
                                        <option selected>Selecione o Valor </option>
                                        <option value="true">Sim</option>
                                        <option value="false">Não</option>
                                    </select>
                                </div>
                                <div class="btn-lm">
                                    <label for="lm">LM - Licenca Maternidade</label>
                                    <select class="form-select" name="lm" id="lm">
                                        <option selected>Selecione o Valor </option>
                                        <option value="true">Sim</option>
                                        <option value="false">Não</option>
                                    </select>
                                </div>
                            </div>

                            <hr/><!--Divisoria-->

                            <div class="lineIV"> <!--4º linha-->
                                <div class="btn-hd">
                                    <label for="hd">/ - 8 Horas <br>Diarias</label>
                                    <input type="text" name="hd" id="hd" class="">
                                </div>
                                <div class="btn-fe">
                                    <label for="fe">FE - Ferias</label>
                                    <input type="text" name="fe" id="fe" class="">
                                </div>
                                <div class="btn-f">
                                    <label for="f">F - Folga</label>
                                    <input type="text" name="f" id="f" class="">
                                </div>
                                <div class="btn-shm">
                                    <label for="shm">SHM - Saldo de Horas <br>no Mes</label>
                                    <input type="text" name="shm" id="shm" class="">
                                </div>
                            </div>
                            
                            <div class="lineV"> <!--5º linha-->
                                <div class="btn-sha">
                                    <label for="sha">SHA - Saldo de Horas <br>Anteriores</label>
                                    <input type="text" name="sha" id="sha" class="">
                                </div>
                                <div class="btn-cht">
                                    <label for="cht">CHT - Carga Horaria <br>Trabalhada</label>
                                    <input type="text" name="cht" id="cht" class="">
                                </div>
                                <div class="btn-sht">
                                    <label for="sht">SHT - Saldo de <br>Horas Total</label>
                                    <input type="text" name="sht" id="sht" class="">
                                </div>
                                <div class="btn-chm">
                                    <label for="chm">CHM - Carga Horaria<br> do Mes</label>
                                    <input type="text" name="chm" id="chm" class="">
                                </div>
                            </div>           

                            <div class="btn-cad-can"> <!-- Botão Cadastrar/Cancelar --> 
                                <button type="submit" name="enviarTabela" value="CAD" class="cad">Cadastrar</button>
                                <button class="can-btn"><a href="tabela_adm.php" class="can_link">Cancelar</a></button>
                            </div>
                    </section>
                </form>
            </div>
        </main>
    </body>
</html>