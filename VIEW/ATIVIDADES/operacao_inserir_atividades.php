<?php
// CORREÇÃO: Apontando para os nomes exatos dos seus arquivos físicos nas pastas
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/atividade.php"; // Puxa a DAL
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php"; // Puxa o Model

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Instancia o Namespace MODEL e a classe Atividades
    $ativ = new MODEL\Atividades(
        null, 
        $_POST['data_atividade'], 
        $_POST['tipo'], 
        $_POST['descricao'], 
        null
    );
    
    // Instancia a DAL
    $dal = new AtividadesDAL();
    $dal->insert($ativ);

    // Redireciona de volta para a listagem
    header("Location: tabela_atividades.php");
    exit();
}
?>