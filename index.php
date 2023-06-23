<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
    <!-- Icones -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
    <body class="wallpaper">
        <?php if (!empty($_GET['msgErro'])) { 
            
                echo $_GET['msgErro']; 
            
            } ?>
            <?php if (!empty($_GET['msgSucesso'])) { 

                echo $_GET['msgSucesso'];
            } 
        ?>

        <header class="hdr"> <!--Cabeçalho-->
            <figure class="logo">
                <img src="img/logo.png">
            </figure>
                    
            <nav class="menu"> <!--Menu-->
                <div class="packge-menu">
                    <section class="pack-menu">
                        <a href="index.php"><p type="button">Inicio</p>
                        <a href="sobrenos.php"><p type="button" >Sobre</p></a>
                        </section>
                </div>
            </nav>
        </header>

        <h2 class="titulo">Faça seu Login</h2>   
        <div class="container"> <!-- Conteúdo | classe externa Bootstrap -->
            <div class="row justify-content-center mt-5">  <!-- Coluna do Bootstrap | classe externa Bootstrap-->
                <div class="packege"> <!-- Tela de Login | classe interna-->
                    <section>
                        <form class="form-login" action="loginConfig.php" method="post"> <!-- Formulario de Login| Classe Interna-->
                            <!-- Matricúla / Senha | classe interna-->
                            <div class="packege-inputs">             
                                        <div class="input-group mb-3">
                                                <span for="matricula" class="input-group-text material-symbols-outlined">person</span>
                                                <input type="matricula" class="form-control" name="matricula" placeholder="Matricúla">
                                        </div>

                                        <div class="input-group mb-3 ">
                                                <span for="senha" class="input-group-text material-symbols-outlined">lock</span>
                                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                                        </div>
                                    </div> <!-- Fim Matricúla / Senha -->
                                    
                                    <!-- Botão Etrar | classe externa Bootstrap-->
                                    <div class="btn-entrar">
                                        <div class="text-center mt-5" >  
                                                <input type="submit" name="enviarDaos" id="entrar" value="Entrar">
                                        </div>  <!-- Fim Botão Entrar --> 
                                    </div>
                                </form> <!-- Fim class form-login -->
                            </section>
                    </div> <!-- Fim class login -->
                </div> <!-- Fim class row -->    
            </div> <!-- Fim class container -->

            <section><!-- Seção Recuperar senha | classe interna-->
                <div class="recuperar">
                    <label for="recup">Esqueceu sua senha?</label>
                    <br/>
                    <a href="recsenha.php"><button>Clique aqui!</button></a>
                </div>
            </section>
    </body>
</html>