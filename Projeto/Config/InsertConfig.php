<?php

require_once 'conexao.php';

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
die();
*/

try {
        $sql = "INSERT INTO servidor
                (nome_serv, cpf, email, matricula, id_esp, statu, senha)
                VALUES
                (:nome_serv, :cpf, :email, :matricula, :id_esp, :statu, :senha)";
    
        $stmt = $pdo->prepare($sql);
    
        $dados = array(
            ':nome_serv' => $_POST['nome_serv'],
            ':cpf' => $_POST['cpf'],
            ':email' => $_POST['email'],
            ':matricula' => $_POST['matricula'],
            ':id_esp' => $_POST['id_esp'],
            ':statu' => ($_POST['statu']),
            ':senha' => $_POST['senha']
        );
    
        if ($stmt->execute($dados)) {
            header("Location: Dashboard.php");
            exit(); // Adicionado exit() para encerrar o script após o redirecionamento.
        } else {
            echo "Erro ao executar a inserção.";
        }
    } catch (PDOException $e) {
        header("Location: /index.php");
        exit(); // Adicionado exit() para encerrar o script após o redirecionamento.
    }