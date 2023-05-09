<?php
class Servidor {
    private $id_servidor = null;
    private $nome;
    private $cpf;
    private $email;
    private $matricula;
    private $id_especialidade;
    private $senha;
    private $statu;

    public function __construct($nome, $cpf, $email, $matricula, $id_especialidade, $senha, $statu) {
       $this->nome = $nome;
       $this->cpf = $cpf;
       $this->email = $email;
       $this->matricula = $matricula;
       $this->id_especialidade = $id_especialidade;
       $this->senha = $senha;
       $this->statu = $statu;
    }

     public function getId_Servidor() {
        return $this->id_servidor;
     }
     public function getNome() {
        return $this->nome;
     }
     
     public function getCPF() {
        return $this->cpf;
     }
     public function getEmail() {
        return $this->email;
     }
     public function getMatricula() {
        return $this->matricula;
     }
     public function getId_Especialidade() {
        return $this->id_especialidade;
     }
     public function getSenha() {
        return $this->senha;
     }
     public function getStatu() {
        return $this->statu;
     }

     public function setId_Servidor($id_servidor) {
        $this->id_servidor = $id_servidor;
     }
     public function setNome($nome) {
        $this->nome = $nome;
     }
     public function setCPF($cpf) {
        $this->cpf = $cpf;
     }
     public function setEmail($email) {
        $this->email = $email;
     }
     public function setMatricula($matricula) {
        $this->matricula = $matricula;
     }
     public function setId_Especialidade($id_especialidade) {
        $this->id_especialidade = $id_especialidade;
     }
     public function setSenha($senha) {
        $this->senha = $senha;
     }
     public function setStatu($statu) {
        $this->statu = $statu;
     }
     
     
     
     
     
          
}
?>  