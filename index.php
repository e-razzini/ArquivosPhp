<?php
function autoload($class)
{
    if (file_exists('./classes/' . $class . ".php")) {
        include('./classes/' . $class . ".php");
    }
}
spl_autoload_register("autoload");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">

            <div class="card w-50 mt-5 p-2">

                <form action="acao.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <h2>Cadastro de arquivo</h2>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nome arquivo</span>
                        <input type="text" name="nomeArquivo" class="form-control" placeholder="arquivo nome " aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" class="form-control" name="file" id="inputGroupFile01">
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-primary" name='cadastro' type="submit">ENVIAR</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <table class="table table-dark table-striped w-50 p-1">
                <thead>
                    <tr>
                        <th scope='col'>NOME DO ARQUIVO</th>
                        <th scope='col'>IMAGEN</th>
                        <th scope='col'>AÇÃO</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $file = new File();
                    $rowFile = $file->listarFile();
                    foreach ($rowFile as $key => $value) {

                    ?>
                        <tr>
                            <td><?= $value['name'] ?></td>
                            <td>
                                <img class="img-responsive-list" src="<?= $value['path_arquive'] ?>" alt="" srcset="">
                            </td>
                            <td>
                                <a href="acao.php?id=<?= $value['id_file']; ?>">
                                    <button type="button" class="btn btn-primary">EDITAR</button>
                                </a>

                                <a class="ml-2" href="acao.php?id_delete=<?= $value['id_file']; ?>&root=<?=$value['path_arquive']?>">
                                    <button type="button" class="btn btn-danger">DELETE</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>

            </table>
        </div>
    </div>
</body>

</html>