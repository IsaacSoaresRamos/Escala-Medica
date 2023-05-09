<?php
    class PdoConexao {
        private static $instancia;
       
        private function __construct() { }

        private function __clone() { }
       
        public function __wakeup() { }
       
        public static function getInstancia() {
            if(!isset(self::$instancia)) {
                 try {
                     $dsn = "pgsql:host=localhost;dbname=escala";
                     $usuario = "postgres";
                     $senha = "06225770186"; // Preencha aqui com a senha do seu servidor de banco de dados.
                     
                     // Instânciado um novo objeto PDO informando o DSN e parâmetros de Array
                     self::$instancia = new PDO( $dsn, $usuario, $senha );
                     
                     // Gerando um excessão do tipo PDOException com o código de erro
                     self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                 
                 } catch ( PDOException $excecao ){
                     echo $excecao->getMessage();
                     // Encerra aplicativo
                     exit();
                 }
             }
             return self::$instancia;
            }
       }