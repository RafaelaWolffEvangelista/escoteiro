<?php
   include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiro.php";
   include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/escoteiro.php";  

   $escoteiro = new \MODEL\Escoteiro(); 
   $escoteiro->setId($_POST['id']);
   $escoteiro->setNomeCompleto($_POST['nome']);
   $escoteiro->setDataNascimento($_POST['data_nascimento']);
   $escoteiro->setNomeResponsavel($_POST['nome_responsavel']);
   $escoteiro->setBolsaFamilia(!empty($_POST['bolsa_familia']));

   $dalEscoteiro = new DAL\Escoteiro();
   $existing = $dalEscoteiro->SelectById($_POST['id']);
   $escoteiro->setStatus($existing ? $existing->getStatus() : 'Ativo');

  $dalEscoteiro->Update($escoteiro); 

  header("location: tabela_escoteiro.php");

?>