<?php
    // Inclua o arquivo de conexão com o banco de dados
    require_once 'conexao.php';

    // Inicie a sessão
    session_start();

    // Verifique se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: index.php');
    }

    // Verifique se foi passado um ID válido pela URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: dashboard.php');
    }

    // Obtenha o ID do servidor da URL
    $id = $_GET['id'];

    // Verifique se o servidor existe no banco de dados
    $sql = "SELECT nome FROM servidores WHERE id = $id";
    $result = $conexao->query($sql);
    if ($result->num_rows == 0) {
        header('Location: dashboard.php');
    }

    // Se o formulário foi enviado, exclua o servidor do banco de dados
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Exclua o servidor do banco de dados
        $sql = "DELETE FROM servidores WHERE id = $id";
        $conexao->query($sql);

        // Redirecione de volta para a página de dashboard
        header('Location: dashboard.php');
    }

    // Obtenha as informações do servidor do banco de dados
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Excluir Servidor</title>
    </head>
    <body>
        <h1>Excluir Servidor</h1>
        <p>Tem certeza de que deseja excluir o servidor "<?php echo $row['nome']; ?>"?</p>
        <form method="POST">
            <button type="submit">Sim</button>
            <a href="dashboard.php">Não</a>
        </form>
    </body>
</html>
