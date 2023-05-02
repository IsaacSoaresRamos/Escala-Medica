<?php 
require_once 'conexao.php';


if (empty($_SESSION)) {
  header("Location: index.php");
  die();
}
?>