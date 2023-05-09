<?php

header("Content-Type: text/html; charset=utf-8",true);

include_once "Servidor.class.php";
include_once "PdoConexao.class.php";
include_once "DaoServidor.class.php";


$Servidor1 = new Servidor( "Alexandre Barbosa", "03598224850", "teste@teste.com.br", "11999999999", "1", "123", "Ativo");

$PersitenciaServidor1 = new DaoServidor();


echo '<pre>';
var_dump($PersitenciaServidor1->readAll());
echo '</pre>';

die();

$Servidor = $PersitenciaServidor1->readAll();
echo '<table border="1">';
foreach($servidor as $linha){
   echo '<tr>';
   echo "<td>". $linha['id_servidor'] ."</td>";
   echo "<td>". $linha['nome']." </td>";
   echo "<td>". $linha['cpf']."</td>";
   echo "<td>". $linha['email']." </td>";
   echo "<td>". $linha['matricula']." </td>";
   echo "<td>". $linha['id_especialidade']."</td>";
   echo "<td>". $linha['senha']."</td>";
   echo "<td>". $linha['statu']."</td>";
   echo "<td><a href=\"apagar.php?id=". $linha['id_servidor']."\">Apagar</a> </td>";
   
   
   echo '</tr>';
}
echo '</table>';


die();

if($PersitenciaServidor1->create($Servidor1)){
    echo '<p>Inseridos no banco com Êxito</p>';
}

var_dump($PersitenciaContato1->read(1));
echo "<hr>";

$Servidor2 = $PersitenciaServidor1->read(1);

$Servidor1->setNome("João Silva");
$Servidor1->setEmail("joao@teste.com.br");

if($PersitenciaServidor1->update($Servidor1)){
    echo '<p>Atualizado no banco com Êxito</p>';
}

var_dump($PersitenciaServidor1->read(1));
echo "<hr>";

if($PersitenciaContato1->delete(1)){
    echo '<p>Excluído do banco com Êxito</p>';
}
?>