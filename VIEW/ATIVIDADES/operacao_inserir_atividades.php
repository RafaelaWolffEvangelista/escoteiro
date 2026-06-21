<?php
// 1. OBRIGATÓRIO: Apontando para os nomes exatos no PLURAL (atividades.php)
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/atividades.php"; // Alterado para o plural
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php"; // Seu model físico

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Instancia o Namespace MODEL e a classe Atividades
    // O último parâmetro (null) representa o id_usuario que vimos no seu banco
    $ativ = new MODEL\Atividades(
        null, 
        $_POST['data_atividade'], 
        $_POST['tipo'], 
        $_POST['descricao'], 
        null
    );
    
    // Instancia a DAL (Certifique-se de que a classe dentro do seu arquivo atividades.php se chama AtividadesDAL)
    $dal = new AtividadesDAL();
    $dal->insert($ativ);

    // Redireciona de volta para a listagem principal de atividades coletivas
    header("Location: tabela_atividades.php");
    exit();
}
?>