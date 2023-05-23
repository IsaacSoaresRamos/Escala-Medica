<?php

try{
            $sql = "UPDATE 
                        servidor 
                    SET
                        nome_serv = :nome_serv,
                        cpf = :cpf,
                        email = :email,
                        matricula = :matricula,
                        id_esp = :id_esp,
                        senha = :senha,
                        statu = :statu
                    WHERE
                        id_serv = :id_serv";

            $dados = array(
                ':id_serv' => $_POST['id_serv'],
                ':nome_serv' => $_POST['nome_serv'],
                ':cpf' => $_POST['cpf'],
                ':email' => $_POST['email'],
                ':matricula' => $_POST['matricula'],
                ':id_esp' => $_POST['id_esp'],
                ':senha' => sha1($_POST['senha']),
                ':statu' => $_POST['statu']
                );

                $stmt = $pdo->prepare($sql);

                if ($stmt->execute($dados)) {
                        header("Location: Dashboard.php");
                  }
       }catch(PDOException $e) {
            header("Location: Dashboard.php");
       }
