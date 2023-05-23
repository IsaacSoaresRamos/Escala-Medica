<?php
require_once '/xampp/htdocs/projeto_escala/Escala-Medica/Projeto/Config/conexao.php';

if (!empty($_GET['id_serv'])){
  $sql = "SELECT * FROM servidor WHERE id_serv = :id_serv";

  try{

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id_serv' => $_GET['id_serv']));

    if ($stmt->rowCount() == 1) {
      $result = $stmt->fetchAll();
      $result = $result[0]; 

    }
    else {
     
      header("Location: Dashboard.php?");
      die();
    }

  }catch (PDOException $e){
      die();
  }

}else{

}
?>
<html lang="pt-br" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Alterar Servidor</title>
  
  </head>

  <body>
    <h2>Atialização de Servidore</h2>

    <form method="post" action="/Escala-Medica/Projeto/Config/AltConfig.php">

      <input type="hidden" name="id_serv" id="id_serv" value="<?php echo $result['id_serv']; ?>" readonly >

      <label>Nome:</label>

      <input type="text" name="nome_serv" id="nome_serv" value="<?php echo $result['nome_serv']; ?>" required><br><br>

      <label>CPF:</label>
      <input type="text" name="cpf" id="cpf" value="<?php echo $result['cpf']; ?>" required><br><br>

      <label>Matrícula:</label>
      <input type="text" name="matricula" id="matricula" value="<?php echo $result['matricula']; ?>" required><br><br>

      <label>E-mail:</label>
      <input type="email" name="email" id="email" value="<?php echo $result['email']; ?>" required><br><br>

      <label>especialidade:</label>
      <select name="id_esp" id="id_esp"required>
        <option value="">Selecione uma especialidade</option>
        <option value="Analista"  <?php if($result['id_esp'] == 'Analista') echo "selected" ?>>Analista</option>
        <option value="Tecnico"   <?php if($result['id_esp'] == 'Tecnico')  echo "selected" ?>>Técnico</option>
      </select><br><br>

      <label>Status:</label>
      <select name="statu" id="statu"required>
        <option value="">Selecione um status</option>
        <option value="Ativo"   <?php if($result['statu'] == 'Ativo') echo "selected" ?>>Ativo</option>
        <option value="Inativo" <?php if($result['statu'] == 'Inativo') echo "selected" ?>>Inativo</option>
      </select><br><br>

      <label>Senha:</label>
      <input type="password" name="senha" id="senha" value="<?php echo $result['senha']; ?>" required><br><br>  

      <button type="submit" name="enviarDados" >Alterar</button>
      <a href="Dashboard.php" >Cancelar</a>
    </form>
  </body>

</html>