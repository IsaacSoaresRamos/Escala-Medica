<?php 
require_once 'Conexao.php'; //Puxa a conexão do banco

session_start();//Inicia a seção

if (empty($_SESSION)) {
  // Significa que as variáveis de SESSAO não foram definidas.
  // Não poderia acessar aqui.
  header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
  die();
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
        <title>Tabela de Escala</title>
    </head>
    <body>
        <h1>Cadastrar dados na Tabela de Escala</h1>
        <form action="processa_tabela.php" method="post">
            <label for="id_serv">ID do Servidor</label>
            <input type="text" name="id_serv" id="id_serv" class="">
            <br>
            <label for="id_esp">Id da Especialidade</label>
            <input type="text" name="id_esp" id="id_esp" class="">
            <br>
            <label for="sd">SD - Servico Diurno</label>
            <select class="form-select" name="sd" id="sd">
                <option selected>Selecione o Valor </option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br>
            <label for="sv">SV - Servico Vespertino</label>
            <select class="form-select" name="sv" id="sv">
                <option selected>Selecione o Valor </option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br>
            <label for="lc">LC - Licenca ou Atestado Medico</label>
            <select class="form-select" name="lc" id="lc">
                <option selected>Selecione o Valor </option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br>
            <label for="lp">LP - Licenca Premio</label>
            <select class="form-select" name="lp" id="lp">
                <option selected>Selecione o Valor </option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br>
            <label for="lm">LM - Licenca Maternidade</label>
            <select class="form-select" name="lm" id="lm">
                <option selected>Selecione o Valor </option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br>
            <label for="sha">SHA - Saldo de Horas Anteriores</label>
            <input type="text" name="sha" id="sha" class="">
            <br>
            <label for="fe">FE - Ferias</label>
            <input type="text" name="fe" id="fe" class="">
            <br>
            <label for="f">F - Folga</label>
            <input type="text" name="f" id="f" class="">
            <br>
            <label for="shm">SHM - Saldo de Horas no Mes</label>
            <input type="text" name="shm" id="shm" class="">
            <br>
            <label for="hd">/ - 8 Horas Diarias</label>
            <input type="text" name="hd" id="hd" class="">
            <br>
            <label for="cht">CHT - Carga Horaria Trabalhada</label>
            <input type="text" name="cht" id="cht" class="">
            <br>
            <label for="sht">SHT - Saldo de Horas Total</label>
            <input type="text" name="sht" id="sht" class="">
            <br>
            <label for="chm">CHM - Carga Horaria do Mes</label>
            <input type="text" name="chm" id="chm" class="">
            <br>
            <button type="submit" name="enviarTabela" value="CAD" class="">Cadastrar</button>
            <a href="tabela_adm.php" class="">Cancelar</a>
        </form>
    </body>
</html>