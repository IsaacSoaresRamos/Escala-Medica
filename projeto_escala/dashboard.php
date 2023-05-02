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

<?php if (!empty($serv)){ ?>

    <a href="/projeto_escala/Escala-Medica/projeto_escala/cadastro.php" ><button>Cadastrar</button></a>

    <table>
        <thead>
            <tr>
                <th >nome</th>
                <th >cpf</th>
                <th >email</th>
                <th >matricula</th>
                <th >especialidade</th>
                <th >status</th>
                <th >ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serv as $a) { ?>
                <tr>
                    <td><?php echo $a['nome']?></td>
                    <td><?php echo $a['cpf']?></td>
                    <td><?php echo $a['email']?></td>
                    <td><?php echo $a['matricula']?></td>
                    <td><?php echo $a['id_especialidade']?></td>
                    <td><?php echo $a['statu']?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $a['id']; ?>">Editar</a>
                        <a href= >Excluir</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>

<?php } ?>