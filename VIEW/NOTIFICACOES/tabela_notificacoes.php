<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/notificacoes.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/notificacoes.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";

use DAL\notificacoes;

$dalNotificacao = new DAL\notificacoes();

if (isset($_GET['busca_mensagem']) && !empty($_GET['busca_mensagem'])) {
    $termo = $_GET['busca_mensagem'];
    $lstNotificacao = $dalNotificacao->SelectByNome($termo);
} else {
    $termo = "";
    $lstNotificacao = $dalNotificacao->Select();
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
    <title>Listar Notificações</title>
</head>

<body class="teal lighten-4">
    <div>
        <h1>Listar Notificações</h1>

        <div class="row lime lighten-3 black-text">
            <form action="tabela_notificacoes.php" method="get" class="col s12">
                <div class="input-field col s12">
                    <input id="search" type="search" name="busca_mensagem" class="col s6">
                    <label for="icon_prefix"> Filtrar por mensagem...</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Filtrar
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>

        <table class="striped responsive-table hover: lime lighten-3">
            <tr>
                <th>ID</th>
                <th>TIPO</th>
                <th>MENSAGEM</th>
                <th>DATA ENVIO</th>
                <th>ESCOTEIRO</th>
            </tr>
            <?php
            foreach ($lstNotificacao as $notificacao) { ?>
                <tr>
                    <td><?php echo $notificacao->getId_notificacao(); ?></td>
                    <td><?php echo $notificacao->getTipo(); ?></td>
                    <td><?php echo $notificacao->getMensagem(); ?></td>
                    <td><?php echo $notificacao->getData_envio(); ?></td>
                    <td><?php echo $notificacao->getId_escoteiro(); ?></td>
                </tr>

            <?php  } ?>
        </table>

    </div>
</body>

</html>