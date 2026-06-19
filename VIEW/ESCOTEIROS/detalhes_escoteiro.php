<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";  

$id = $_GET['id']; 

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiro.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/escoteiro.php";

use DAL\Escoteiro;


$dalEscoteiro = new DAL\Escoteiro();
$escoteiro = $dalEscoteiro->SelectById($id);

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
    <title>Detalhes de Escoteiro</title>
</head>

<body class="teal lighten-4">
    <div class="container deep-orange lighten-1 col s12 ">
        <div class="center light-blue darken-3 white-text col s12">
            <h3>Informações de Escoteiro</h3>
        </div>


        <div class="row grey lighten-2 black-text">
            <form action="operacao_editar_escoteiro.php" method="post" class="row">
                <div class="input-field col s8">
                    <label for="id" class="black-text bold">ID: <?php echo $escoteiro->getId() ?>
                    </label>
                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                </div>

                <div class="input-field col s8">
                    <label for="nomelabel" class="black-text bold">Nome Completo: <?php echo $escoteiro->getNomeCompleto() ?> </label>
                </div>

                <div class="input-field col s8">
                    <label for="cidadelabel" class="black-text bold">Data de Nascimento: <?php echo $escoteiro->getDataNascimento() ?></label>
                </div>

                <div class="input-field col s8">

                    <label for="bairrolabel" class="black-text bold">Nome Responsável: <?php echo $escoteiro->getNomeResponsavel() ?></label>
                </div>

                <div class="input-field col s8">
                    <label for="idaddelabel" class="black-text bold">Bolsa Familia: <?php echo $escoteiro->getBolsaFamilia() ?></label>
                </div>

                <div class="row center col s8">
                    <a class="waves-effect waves-light blue btn"
                        onclick="JavaScript:location.href='tabela_escoteiro.php'">
                        <i class="material-icons right">arrow_back</i>Voltar
                    </a>

                    <a class="waves-effect waves-light orange btn"
                        onclick="JavaScript:location.href='editar_escoteiro.php?id=' + '<?php echo $escoteiro->getId(); ?>'">
                        <i class="material-icons right">edit</i>Editar
                    </a>

                    <a class="waves-effect waves-light red btn"
                        onclick="JavaScript: remover( <?php echo $escoteiro->getId(); ?> )">
                        <i class="material-icons right">delete</i>Remover
                    </a>
                </div>
            </form>


        </div>
        <br />

    </div>
</body>

</html>

<script>
    function remover(id) {
        if (confirm('Excluir Escoteiro ' + id + '?')) {
            location.href = 'operacao_remover_escoteiro.php?id=' + id;
        }
    }
</script>