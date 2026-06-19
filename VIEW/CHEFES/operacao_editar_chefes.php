<?php
 include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/chefes_voluntario.php";
   include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/chefes.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chefe = new MODEL\Chefes((int)$_POST['id_voluntario'], $_POST['nome'], $_POST['funcao'], $_POST['telefone'], $_POST['status'], null);
    $dal = new DAL\Chefes_voluntario();
    $dal->update($chefe);
    header("Location: tabela_chefes.php");
    exit();
}