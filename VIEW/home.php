<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:/escoteiro/VIEW/LOGIN/inserir_login.php");
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/shared_nav.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gestão Cambuy</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/escoteiro/VIEW/css/home.css">
   

</head>
<body>

    <main class="home-container">
        <header class="welcome-card">
            <div class="welcome-text">
                <h1>BEM VINDO ⚜️</h1>
                <p> Escolha uma das opções abaixo para começar.</p>
            </div>
        </header>

     <h2 class="section-title">Acesso Rápido</h2>
    <section class="dashboard-grid">
        
        <a href="/escoteiro/view/ESCOTEIRO/inserir_escoteiro.php" class="dash-card">
            <div class="card-icon"><i class="material-icons">person_add</i></div>
            <h3>Cadastro Escoteiro</h3>
            <p>Gerencie e adicione novos membros ao grupo.</p>
        </a>

        <a href="/escoteiro/view/ATIVIDADES/inserir_atividades.php" class="dash-card">
            <div class="card-icon"><i class="material-icons">event</i></div>
            <h3>Atividades</h3>
            <p>Organize o calendário, acampamentos e reuniões.</p>
        </a>

        <a href="/escoteiro/view/CHEFES/inserir_chefes.php" class="dash-card">
            <div class="card-icon"><i class="material-icons">supervisor_account</i></div>
            <h3>Chefia</h3>
            <p>Controle de patrulhas, alcateias e conselhos do grupo.</p>
        </a>

    </section>
    </main>

</body>
</html>