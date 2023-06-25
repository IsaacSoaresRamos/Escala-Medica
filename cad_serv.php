<?php 
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

//if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
 // header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  //die();
//}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Servidor</title>
    <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS -->
        <link rel="stylesheet" href="css/cad_serv.css">
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
        <header>
            <h1>Cadastrar Servidor</h1>
        </header>
        <section>
                <div class="container-form">
                    <form action="Processa_user.php" method="post">

                        <div class="pack-formI"> <!-- 1º Linha -->
                            <div class="pack-input-name">
                                <label for="nome" style="margin-left: 2.4rem;">Nome Completo</label>
                                <input type="text" name="nome" id="nome">
                            </div>
                            <div class="pack-input-cpf" style="margin-left: 2rem;">
                                <label for="cpf" style="margin-left: 5rem;">CPF</label>
                                <input type="text" name="cpf" id="cpf">
                            </div>
                            <div class="pack-input-matric" style="margin-left: 2rem;">
                                <label for="matricula" style="margin-left: 4rem;">Matricula</label>
                                <input type="text" name="matricula" id="matricula" class="">
                            </div>
                        </div>

                        <div class="pack-formII"> <!-- 2º Linha -->
                            <div class="pack-input-email">
                                <label for="email" style="margin-left: 7.4rem;">E-mail</label>
                                <input type="email" name="email" id="email" style="margin-left: 3rem;">
                            </div>
                            <div class="pack-select">
                                <label for="adm" style="margin-left: 3.4rem;">Adiministrador</label>
                                <select class="form-select" name="adm" id="adm">
                                    <option selected>Selecione o Valor</option>
                                    <option value="SIM">Sim</option>
                                    <option value="NAO">Não</option>
                                </select>
                            </div>
                            <div class="pack-input-password" >
                                <label for="senha" style="margin-left: 4.5rem;">Senha</label>
                                <input type="password" name="senha" id="senha" class="">
                            </div>
                        </div>
                        <div class="btn-cad-can"> <!-- Botão Cadastrar/Cancelar --> 
                            <button type="submit" name="enviarDados" class="cad">Cadastrar</button>
                            <button class="can-btn"><a href="index_logado_adm.php" class="can_link">Cancelar</a></button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
    </body>
</html>