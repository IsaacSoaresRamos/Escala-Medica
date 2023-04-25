<?php
require_once 'conexao.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';
die();

if (!empty($_POST)) {

    if($_POST['enviarDados'] == 'CAD'){//inserir
        
            try {
                $sql = "INSERT INTO servidor
                        (nome, cpf, email, matricula, cargo, senha, statu)
                        VALUES
                        (:nome, :cpf, :email, :matricula, :cargo, :senha, :statu)";

                $stmt = $pdo->prepare($sql);

                $dados = array(
                ':nome' => $_POST['nome'],
                ':cpf' => $_POST['cpf'],
                ':email' => $_POST['email'],
                ':matricula' => $_POST['matricula'],
                ':cargo' => $_POST['cargo'],
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
                        cargo = :cargo
                        senha = :senha
                        statu = :statu
                    WHERE
                        id = :id";

            $dados = array(
                ':id' => $_POST['id'],
                ':nome' => $_POST['nome'],
                ':cpf' => $_POST['cpf'],
                ':email' => $_POST['email'],
                ':matricula' => $_POST['matricula'],
                ':cargo' => $_POST['cargo'],
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

    }else{
        header("Location: cadastro.php");
    }

}
else {
  header("Location: cadastro.php");
}
die();

?>
