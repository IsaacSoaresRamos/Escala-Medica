
<h2>Cadastro de Servidores</h2>



<form method="post" action="/projeto_escala/Escala-Medica/Projeto/Config/InsertConfig.php">
  <label>Nome:</label>
  <input type="text" name="nome_sev" id="nome_serv" required><br><br>

  <label>CPF:</label>
  <input type="text" name="cpf" id="cpf" required><br><br>

  <label>Matrícula:</label>
  <input type="text" name="matricula" id="matricula" required><br><br>

  <label>E-mail:</label>
  <input type="email" name="email" id="email" required><br><br>

  <label>especialidade:</label>
  <select name="id_esp" id="id_esp"required>
    <option value="">Selecione uma especialidade</option>
    <option value="1">Doutor</option>
  </select><br><br>

  <label>Status:</label>
  <select name="statu" id="statu"required>
    <option value="">Selecione um status</option>
    <option value="Ativo">Ativo</option>
    <option value="Inativo">Inativo</option>
  </select><br><br>

  <label>Senha:</label>
  <input type="password" name="senha" id="senha" required><br><br>  

  <button type="submit" >Cadastrar</button>
  <a href="/projeto_escala/Escala-Medica/Projeto/Dashboard.php" >Cancelar</a>
</form>
