<?php
   include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiro.php";
   include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/escoteiro.php";  

   $escoteiro = new \MODEL\Escoteiro(); 

   $escoteiro->setNomeCompleto($_POST['nome']);
   $escoteiro->setDataNascimento($_POST['data_nascimento']);
   $escoteiro->setNomeResponsavel($_POST['nome_responsavel']);
   $escoteiro->setBolsaFamilia(!empty($_POST['bolsa_familia'])); 
   $escoteiro->setStatus('Ativo');

  $dalEscoteiro = new DAL\Escoteiro(); 
  $dalEscoteiro->Insert($escoteiro); 

  header("location: tabela_escoteiro.php");

?>