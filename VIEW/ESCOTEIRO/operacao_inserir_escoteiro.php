<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiros.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/escoteiro.php";  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Instancia o modelo usando o namespace correto
    $escoteiro = new \MODEL\Escoteiro(
        null, 
        $_POST['nome'] ?? '', 
        $_POST['data_nascimento'] ?? '', 
        $_POST['nome_responsavel'] ?? '', 
        $_POST['telefone_responsavel'] ?? '', 
        0, 
        $_POST['status'] ?? ''
    );
    
    // 2. CORREÇÃO DO ERRO: Adicionado \DAL\ para o PHP localizar a classe no namespace correto
    $dal = new \DAL\EscoteiroDAL();
    $dal->insert($escoteiro);
    
    // 3. Redireciona para o arquivo de listagem
    header("Location: tabela_escoteiro.php");
    exit();
}
?>