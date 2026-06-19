<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";  
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
    <title>Inserir Escoteiro</title>
</head>

<body class="teal lighten-4">
    <div class="container deep-orange lighten-1 col s12 ">
        <div class="center light-blue darken-3 white-text col s12">
            <h3>Inserir Escoteiro</h3>
        </div>


        <div class="row grey lighten-2 black-text">
            <form action="operacao_inserir_escoteiro.php" method="post" class="row">

                <div class="input-field col s8">
                    <input placeholder="Informar o nome do escoteiro" id="nome"
                        name="nome" type="text" class="validate">
                    <label for="nomelabel">Nome: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar a data de nascimento" id="data_nascimento"
                        name="data_nascimento" type="text" class="validate">
                    <label for="data_nascimentolabel">Data de Nascimento: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar o nome do responsavel" id="nome_responsavel"
                        name="nome_responsavel" type="text" class="validate">
                    <label for="nome_responsavelabel">Nome do Responsável: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar se possui bolsa familiar" id="bolsa_familia"
                        name="bolsa_familia" type="text" class="validate">
                    <label for="bolsa_familialabel">Bolsa Familia: </label>
                </div>

                <div class="row center col s8">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>


        </div>
        <br />

    </div>
</body>

</html>