<?php

require_once 'conexao.php';

try {
        $sql = "INSERT INTO servidor
                (nome, cpf, email, matricula, id_esp, senha, statu)
                VALUES
                (:nome, :cpf, :email, :matricula, :id_esp, :senha, :statu)";
    
        $stmt = $pdo->prepare($sql);
    
        $dados = array(
            ':nome' => $_POST['nome'],
            ':cpf' => $_POST['cpf'],
            ':email' => $_POST['email'],
            ':matricula' => $_POST['matricula'],
            ':id_esp' => $_POST['id_esp'],
            ':senha' => ($_POST['senha']),
            ':statu' => $_POST['statu']
        );
    
        if ($stmt->execute($dados)) {
            header("Location: /dashboard.php");
            exit(); // Adicionado exit() para encerrar o script após o redirecionamento.
        } else {
            echo "Erro ao executar a inserção.";
        }
    } catch (PDOException $e) {
        header("Location: /index.php");
        exit(); // Adicionado exit() para encerrar o script após o redirecionamento.
    }