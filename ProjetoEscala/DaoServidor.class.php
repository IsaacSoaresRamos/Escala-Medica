<?php
include_once "iDaoModeCrud.interface.php";

class DaoServidor implements iDaoModeCrud{
    private $instanciaConexaoPdoAtiva;
       private $tabela;
      
       public function __construct() {
          $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
          $this->tabela = "servidor";
       }

       public function create( $objeto ) {
        $id_servidor = $this->getNewId_Servidor();
        $nome = $objeto->getNome();
        $cpf = $objeto->getCPF();
        $email = $objeto->getEmail();
        $matricula = $objeto->getMatricula();
        $id_especialidade = $objeto->getEspecialidade();
        $senha = $objeto->getSenha();
        $statu = $objeto->getStatu();
        $sqlStmt = "INSERT INTO {$this->tabela} (id_servidor, nome, cpf, email, matricula, id_especialidade, senha, statu) VALUES (:id, :nome, :cpf, :email, :matricula, :id_especialidade, :senha, :statu)";
        try {
           $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
           $operacao->bindValue(":id_servidor", $id_servidor, PDO::PARAM_INT);
           $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
           $operacao->bindValue(":cpf", $cpf, PDO::PARAM_STR);
           $operacao->bindValue(":email", $email, PDO::PARAM_STR);
           $operacao->bindValue(":matricula", $matricula, PDO::PARAM_STR);
           $operacao->bindValue(":id_especialidade", $id_especialidade, PDO::PARAM_INT);
           $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
           $operacao->bindValue(":statu", $statu, PDO::PARAM_STR);
           if($operacao->execute()){
                 if($operacao->rowCount() > 0) {
                    $objeto->setId_Servidor($id_servidor);
                    return true;
                 } else {
                    return false;
                 }
              } else {
                 return false;
           }
        } catch( PDOException $excecao ) {
              echo $excecao->getMessage();
        }
     }

     public function readAll() {
        $sqlStmt = "SELECT * from {$this->tabela} ORDER BY nome;" ;
        try {
           $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
           $operacao->execute();
           $linhas = $operacao->fetchAll(PDO::FETCH_ASSOC);
           return $linhas;
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }

     public function read( $id_servidor ) {
        $sqlStmt = "SELECT * from {$this->tabela} WHERE id_servidor=:id_servidor";
        try {
           $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
           $operacao->bindValue(":id_servidor", $id_servidor, PDO::PARAM_INT);
           $operacao->execute();
           $getRow = $operacao->fetch(PDO::FETCH_OBJ);
           $nome = $getRow->nome;
           $cpf = $getRow->cpf;
           $email = $getRow->email;
           $matricula = $getRow->matricula;
           $id_especialidade = $getRow->especialidade;
           $senha = $getRow->senha;
           $statu = $getRow->statu;

           $objeto = new Servidor( $nome, $cpf, $email, $matricula, $id_especialidade, $senha, $statu );
           $objeto->setId_Servidor($id_servidor);
           return $objeto;
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }


     public function update( $objeto ) {
        $id_servidor = $objeto->getId_Servidor();
        $nome = $objeto->getNome();
        $matricula = $objeto->getMatricula();
        $email = $objeto->getEmail();
        $id_especialidade = $objeto->getId_Especialidade();
        $senha = $objeto->getSenha();
        $statu = $objeto->getStatu();
        $sqlStmt = "UPDATE {$this->tabela} SET nome=:nome, matricula=:matricula, email=:email, id_especialidade=:id_especialidade, senha=:senha, statu=:statu  WHERE id_servidor=:id_servidor";
        try {
           $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
           $operacao->bindValue(":id_servidor", $id_servidor, PDO::PARAM_INT);
           $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
           $operacao->bindValue(":matricula", $matricula, PDO::PARAM_STR);
           $operacao->bindValue(":email", $email, PDO::PARAM_STR);
           $operacao->bindValue(":id_especialidade", $id_especialidade, PDO::PARAM_INT);
           $operacao->bindValue(":senha", $senha, PDO::PARAM_STR);
           $operacao->bindValue(":statu", $statu, PDO::PARAM_STR);
           if($operacao->execute()){
              if($operacao->rowCount() > 0){
                 return true;
              } else {
                 return false;
              }
           } else {
              return false;
           }
        } catch ( PDOException $excecao ) {
           echo $excecao->getMessage();
        }
     }

     public function delete( $id_servidor ) {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE id_servidor=:id_servidor";
       try {
          $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
          $operacao->bindValue(":id_servidor", $id_servidor, PDO::PARAM_INT);
          if($operacao->execute()){
             if($operacao->rowCount() > 0) {
                   return true;
             } else {
                   return false;
             }
          } else {
             return false;
          }
       } catch ( PDOException $excecao ) {
          echo $excecao->getMessage();
       }
    }

    private function getNewId_Servidor(){
        $sqlStmt = "SELECT MAX(id_servidor) AS id_servidor FROM {$this->tabela}";
        try {
           $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
           if($operacao->execute()) {
              if($operacao->rowCount() > 0){
                 $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                 $idReturn = (int) $getRow->id_servidor + 1;
                 return $idReturn;
              } else {
                 throw new Exception("Ocorreu um problema com o banco de dados");
                 exit();
              }
           } else {
              throw new Exception("Ocorreu um problema com o banco de dados");
              exit();
            }
        } catch (PDOException $excecao) {
           echo $excecao->getMessage();
        }
     }
  }

?>