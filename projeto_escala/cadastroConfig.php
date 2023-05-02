<?php
require_once 'conexao.php';
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
die();
*/
if (!empty($_POST)) {

    if($_POST['enviarDados'] == 'CAD'){//inserir
        
            try {
                $sql = "INSERT INTO servidor
                        (nome, cpf, email, matricula, id_especialidade, senha, statu)
                        VALUES
                        (:nome, :cpf, :email, :matricula, :id_especialidade, :senha, :statu)";

                $stmt = $pdo->prepare($sql);

                $dados = array(
                ':nome' => $_POST['nome'],
                ':cpf' => $_POST['cpf'],
                ':email' => $_POST['email'],
                ':matricula' => $_POST['matricula'],
                ':id_especialidade' => $_POST['id_especialidade'],
                ':senha' => sha1($_POST['senha']),
                ':statu' => $_POST['statu']
                );

                if ($stmt->execute($dados)) {
                header("Location: dashboard.php");
                }
            } catch (PDOException $e) {
                header("Location: index.php");
            }
    }elseif($_POST['enviarDados'] == 'ALT'){//alterar
       try{
            $sql = "UPDATE 
                        servidor 
                    SET
                        nome = :nome,
                        cpf = :cpf,
                        email = :email
                        matricula = :matricula
                        id_especialidade = :id_especialidade
                        senha = :senha
                        statu = :statu
                    WHERE
                        id_servidor = :id_servidor";

            $dados = array(
                ':id_seridor' => $_POST['id_servidor'],
                ':nome' => $_POST['nome'],
                ':cpf' => $_POST['cpf'],
                ':email' => $_POST['email'],
                ':matricula' => $_POST['matricula'],
                ':id_especialidade' => $_POST['id_especialidade'],
                ':senha' => sha1($_POST['senha']),
                ':statu' => $_POST['statu']
                );

                $stmt = $pdo->prepare($sql);

                if ($stmt->execute($dados)) {
                        header("Location: dashboard.php");
                  }
       }catch(PDOException $e) {
            header("Location: dashboard.php");
       }
    }elseif($_POST['enviarDados'] == 'DEL'){//excluir
        try {
            $sql = "DELETE FROM servidor WHERE id_servidor = :id_servidor ";
            $stmt = $pdo->prepare($sql);
      
            $dados = array(':id_servidor' => $_POST['id_servidor']);
      
            if ($stmt->execute($dados)) {
              header("Location: dashboard.php");
            }
            else {
              header("Location: dashboard.php");
            }
          } catch (PDOException $e) {
            //die($e->getMessage());
            header("Location: dashboard.php");
          }
        }else {
            header("Location: dashboard.php");
          }
}else {
  header("Location: cadastro.php");
}
die();

?>
