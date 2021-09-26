<?php 

    function autoload($class){
        if(file_exists('./classes/'.$class.".php")){
        include('./classes/'.$class.".php");
        }
    }
    spl_autoload_register("autoload");


if(isset($_GET['id_delete'])){

    $id = $_GET['id_delete'];
    $root = $_GET['root'];
    $file = new File();

    $file->deleteFile($id,$root);
    header('Location:index.php');
    exit;

}
if(isset($_POST['cadastro'])){

    $format = ['png','jpeg','jpg'];
    $nameFile = $_POST['nomeArquivo'];
    $fileNameRaw = $_FILES['file']['name'];
    $extens = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);

    if(in_array($extens,$format)){

    $sendFile = $_FILES['file']['tmp_name'];
    $newName = uniqid().".$extens";
    $rootFile = 'arquivo/'.$newName;

    $file = new File();
    $file->inserirFile($nameFile,$fileNameRaw,$rootFile,$sendFile);
    header('Location:index.php');
    exit;

    }else {
    header('Location:index.php');
    exit;
    }

}
