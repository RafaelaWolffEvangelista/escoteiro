<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiros.php";
if(isset($_GET['id'])) {
    $dal = new DAL\escoteiros();
    $dal->delete((int)$_GET['id']);
}
header("Location: tabela_escoteiros.php");
exit();