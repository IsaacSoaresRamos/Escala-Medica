<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Acesso ao Sistema</title>
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <!-- CSS -->
     <link rel="stylesheet" href="css/login.css">
</head>
<body class="wallpaper">

     <header class="hdr"> <!--Cabeçalho-->
          <figure class="logo">
               <img src="img/logo.png">
          </figure>
               
          <nav class="menu"> <!--Menu-->
               <div class="packge-menu">
                    <section class="pack-menu">
                         <a href="index.php"><p type="button">Inicio</p>
                         <a href="sobrenos.html"><p type="button" >Sobre Nós</p></a>
                         <a href="index.php" class="link-login"><button type="login">Voltar</button></a>
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
                                   
                                   <div class="packege-matri">
                                        <label for="matricula">Matricúla</label>
                                        <br/>
                                        <input type="matricula" name="matricula" id="matricula" class="btn btn-outline-light">
                                   </div>

                                   <div class="packege-pass">
                                        <label for="senha">Senha</label>
                                        <br/>
                                        <input type="password" name="senha" id="senha" class="btn btn-outline-light">
                                   </div>
                              </div> <!-- Fim Matricúla / Senha -->
                              
                              <!-- Botão Etrar | classe externa Bootstrap-->
                              <div class="btn">
                                   <div class="text-center mt-5" >  
                                        <button type="submit" name="" class="btn btn-outline-light btn-sm btn-block" style="margin-bottom: 23px;">Entrar</button>
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