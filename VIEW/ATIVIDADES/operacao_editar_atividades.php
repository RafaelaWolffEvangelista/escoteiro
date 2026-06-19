<?php
 include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/atividade.php";
   include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ativ = new MODEL\atividade((int)$_POST['id_atividade'], $_POST['data_atividade'], $_POST['tipo'], $_POST['descricao'], null);
    $dal = new DAL\atividade();
    $dal->update($ativ);
    header("Location: tabela_atividades.php");
    exit();
}