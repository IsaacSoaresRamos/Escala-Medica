<?php
session_start();

if (empty($_SESSION)) { //Se SESSION estiver vazio significa que você não se autenticou no sistema
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
}
else { //Se não a seção é destruida e você é redirecionado pro login
  session_destroy();
  header("Location: index.php?msgSucesso=Logout efetuado com sucesso!");
}
die();
 ?>