<?php
require_once 'conexao.php';

if (!empty($_GET['id'])){
  $sql = "SELECT * FROM servidor WHERE id = :id";

  try{

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' => $_GET['id']));

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

      <input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>" readonly >

      <label>Nome:</label>

      <input type="text" name="nome" id="nome" value="<?php echo $result['nome']; ?>" required><br><br>

      <label>CPF:</label>
      <input type="text" name="cpf" id="cpf" value="<?php echo $result['cpf']; ?>" required><br><br>

      <label>Matrícula:</label>
      <input type="text" name="matricula" id="matricula" value="<?php echo $result['matricula']; ?>" required><br><br>

      <label>E-mail:</label>
      <input type="email" name="email" id="email" value="<?php echo $result['email']; ?>" required><br><br>

      <label>Cargo:</label>
      <select name="cargo" id="cargo"required>
        <option value="">Selecione um cargo</option>
        <option value="Analista"  <?php if($result['cargo'] == 'Analista') echo "selected" ?>>Analista</option>
        <option value="Tecnico"   <?php if($result['cargo'] == 'Tecnico')  echo "selected" ?>>Técnico</option>
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