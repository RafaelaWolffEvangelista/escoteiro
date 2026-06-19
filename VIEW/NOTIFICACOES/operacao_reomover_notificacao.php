<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/notificacoes.php";
if(isset($_GET['id'])) {
    $dal = new DAL\notificacoes();
    $dal->delete((int)$_GET['id']);
}
header("Location: tabela_notificacao.php");
exit();