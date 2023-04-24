
<h2>Cadastro de Servidores</h2>

<form method="post" action="cadastroConfig.php">
  <label>Nome:</label>
  <input type="text" name="nome" id="nome" required><br><br>

  <label>CPF:</label>
  <input type="text" name="cpf" id="cpf" required><br><br>

  <label>Matrícula:</label>
  <input type="text" name="matricula" id="matricula" required><br><br>

  <label>E-mail:</label>
  <input type="email" name="email" id="email" required><br><br>

  <label>Cargo:</label>
  <select name="cargo" id="cargo"required>
    <option value="">Selecione um cargo</option>
    <option value="Analista">Analista</option>
    <option value="Técnico">Técnico</option>
  </select><br><br>

  <label>Status:</label>
  <select name="statu" id="statu"required>
    <option value="">Selecione um status</option>
    <option value="Ativo">Ativo</option>
    <option value="Inativo">Inativo</option>
  </select><br><br>

  <label>Senha:</label>
  <input type="password" name="senha" id="senha" required><br><br>  

  <button type="submit" name="enviarDados" class="btn btn-primary" value="CAD">Cadastrar</button>
  <a href="dashboard.php" >Cancelar</a>
</form>
