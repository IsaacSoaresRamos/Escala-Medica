<?php
require_once 'conexao.php';

$sql = "SELECT * FROM servidor ORDER BY id ASC" ;
try{
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()){
        $serv = $stmt->fetchALL();

    } else {
        die();
    }
} catch (PDOException $e){
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Equipes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Equipe</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Especialidade</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Preencher a tabela com os dados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["equipe"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["matricula"] . "</td>";
                    echo "<td>" . $row["id_especialidade"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum dado encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>