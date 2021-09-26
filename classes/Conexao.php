<?php 

class Conexao{

    
    public static $conexao;

         public function __construct(){
             $this->pegaConexao();
         }
         public function __destruct() {
             $this->encerraConexao();
         }
         public static function encerraConexao(){
             self::$conexao = null;
         }
         public static function pegaConexao(){
             self::$conexao = new PDO('mysql:host=localhost;dbname=filesphp;','root','');
             return self::$conexao;
         }

}
?>