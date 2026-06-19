<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/atividade.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";

use DAL\atividade;

$dalAtividade = new DAL\atividade();

if (isset($_GET['busca_tipo']) && !empty($_GET['busca_tipo'])) {
    $termo = $_GET['busca_tipo'];
    $lstAtividade = $dalAtividade->SelectByNome($termo);
} else {
    $termo = "";
    $lstAtividade = $dalAtividade->Select();
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
    <title>Listar Atividades</title>
</head>

<body class="teal lighten-4">
    <div>
        <h1>Listar Atividades</h1>

        <div class="row lime lighten-3 black-text">
            <form action="tabela_atividade.php" method="get" class="col s12">
                <div class="input-field col s12">
                    <input id="search" type="search" name="busca_tipo" class="col s6">
                    <label for="icon_prefix"> Filtrar por tipo...</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Filtrar
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>

        <table class="striped responsive-table hover: lime lighten-3">
            <tr>
                <th>ID</th>
                <th>DATA</th>
                <th>TIPO</th>
                <th>DESCRIÇÃO</th>
                <th> AÇÕES</th>
            </tr>
            <?php
            foreach ($lstAtividade as $atividade) { ?>
                <tr>
                    <td><?php echo $atividade->getId(); ?></td>
                    <td><?php echo $atividade->getData(); ?></td>
                    <td><?php echo $atividade->getTipo(); ?></td>
                    <td><?php echo $atividade->getDescricao(); ?></td>
                    <td>
                        <span class="grey-text text-darken-1">Sem ações</span>
                    </td>
                </tr>

            <?php  } ?>
        </table>

    </div>
</body>

</html>