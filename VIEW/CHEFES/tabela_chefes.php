<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/chefes_voluntario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/chefes.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";

use DAL\chefes;

$dalChefe = new DAL\chefes();

if (isset($_GET['busca_nome']) && !empty($_GET['busca_nome'])) {
    $termo = $_GET['busca_nome'];
    $lstChefe = $dalChefe->SelectByNome($termo);
} else {
    $termo = "";
    $lstChefe = $dalChefe->Select();
}


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Usado para adicionar ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Chefes</title>
</head>

<body class="teal lighten-4">
    <div>
        <h1>Listar Chefes Voluntários</h1>

        <div class="row lime lighten-3 black-text">
            <form action="tabela_chefes.php" method="get" class="col s12">
                <div class="input-field col s12">
                    <input id="search" type="search" name="busca_nome" class="col s6">
                    <label for="icon_prefix"> Filtrar por nome...</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Filtrar
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>

        <table class="striped responsive-table hover: lime lighten-3">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>FUNÇÃO</th>
                <th>TELEFONE</th>
                <th>STATUS</th>
            </tr>
            <?php
            foreach ($lstChefe as $chefe) { ?>
                <tr>
                    <td><?php echo $chefe->getId(); ?></td>
                    <td><?php echo $chefe->getNome(); ?></td>
                    <td><?php echo $chefe->getRamo(); ?></td>
                    <td><?php echo $chefe->getTelefone(); ?></td>
                    <td><?php echo $chefe->getStatus(); ?></td>
                </tr>

            <?php  } ?>
        </table>

    </div>
</body>

</html>