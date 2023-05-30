<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Página Inicial</title>
    </head>
    <body>
    <?php if (!empty($_GET['msgErro'])) { 
        
            echo $_GET['msgErro']; 
        
        } ?>
        <?php if (!empty($_GET['msgSucesso'])) { 

            echo $_GET['msgSucesso'];

        } ?>


    <h1>Olá seja bem vindo!!!</h1>
            <form class="" action="Processa_log.php" method="post">
                    <label for="matricula">Matricula</label>
                    <input type="matricula" name="matricula" id="matricula" class="">
                    <br>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="">
                <br>
                <button type="submit" name="enviarDaos" class="">Entrar</button>
                <a href="cad_serv.php" class="">Cadastre-se</a>
            </form>
    </body>
</html>