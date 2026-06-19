<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiro.php";

$id = $_GET['id'];

$dalEscoteiro = new DAL\Escoteiro(); 
$dalEscoteiro->Delete($id);

header("location: tabela_escoteiro.php");
?>