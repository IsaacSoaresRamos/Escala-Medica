<?php
require_once 'conexao.php';

if (!empty($_GET['id_servidor'])){
  $sql = "SELECT * FROM servidor WHERE id_servidor = :id_servidor";

  try{

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id_servidor' => $_GET['id_servidor']));

    if ($stmt->rowCount() == 1) {
      $result = $stmt->fetchAll();
      $result = $result[0]; 

    }
    else {
     
      header("Location: dashboard.php?");
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

    <form method="post" action="cadastroConfig.php">

      <input type="hidden" name="id_servidor" id="id_servidor" value="<?php echo $result['id_servidor']; ?>" readonly >

      <label>Nome:</label>

      <input type="text" name="nome" id="nome" value="<?php echo $result['nome']; ?>" required><br><br>

      <label>CPF:</label>
      <input type="text" name="cpf" id="cpf" value="<?php echo $result['cpf']; ?>" required><br><br>

      <label>Matrícula:</label>
      <input type="text" name="matricula" id="matricula" value="<?php echo $result['matricula']; ?>" required><br><br>

      <label>E-mail:</label>
      <input type="email" name="email" id="email" value="<?php echo $result['email']; ?>" required><br><br>

      <label>especialidade:</label>
      <select name="id_especialidade" id="id_especialidade"required>
        <option value="">Selecione uma especialidade</option>
        <option value="Analista"  <?php if($result['id_especialidade'] == 'Analista') echo "selected" ?>>Analista</option>
        <option value="Tecnico"   <?php if($result['id_especialidade'] == 'Tecnico')  echo "selected" ?>>Técnico</option>
      </select><br><br>

      <label>Status:</label>
      <select name="statu" id="statu"required>
        <option value="">Selecione um status</option>
        <option value="Ativo"   <?php if($result['statu'] == 'Ativo') echo "selected" ?>>Ativo</option>
        <option value="Inativo" <?php if($result['statu'] == 'Inativo') echo "selected" ?>>Inativo</option>
      </select><br><br>

      <label>Senha:</label>
      <input type="password" name="senha" id="senha" value="<?php echo $result['senha']; ?>" required><br><br>  

      <button type="submit" name="enviarDados" value="ALT">Alterar</button>
      <a href="dashboard.php" >Cancelar</a>
    </form>
  </body>

</html>