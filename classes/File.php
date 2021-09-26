<?php 
class File extends Conexao {

    public function __construct() {}
    public function __destruct() {}

    public function inserirFile($name,$nameArquive,$path,$file){

        $query = "INSERT INTO files (name,name_arquive,path_arquive)VALUES(?,?,?);";
        $exec = self::pegaConexao()->prepare($query);
        $exec->bindParam(1,$name);
        $exec->bindParam(2,$nameArquive);
        $exec->bindParam(3,$path);
        $exec->execute();

        $this->updateFile($file,$path);
    }

    public function listarFile(){
        
        $query ="SELECT * FROM files;";
        $exec = self::pegaConexao()->query($query);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
   

    public function deleteFile($id_file,$file){

        $this->deleteFileArquive($file);

        $query = "DELETE FROM files WHERE id_file = ?";
        $exec = self::pegaConexao()->prepare($query);
        $exec->bindParam(1,$id_file);
        $exec->execute();

    }

    private function updateFile($file,$rootFile){
        
        move_uploaded_file($file,$rootFile);        
    }
    private function deleteFileArquive($path){

        unlink($path);

    }
}
?>