<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php"; 

class atividade 
{
   public function Select()
   {
      $sql = "SELECT * FROM atividades;";
      $con = Conexao::conectar();
      $registros = $con->query($sql);
      $con = Conexao::desconectar();
      $tabela_atividade = [];

      foreach ($registros as $linha) {
         $atividade = new \MODEL\atividade();
         $atividade->setId($linha['id_atividade']);
         $atividade->setData($linha['data_atividade']);
         $atividade->setTipo($linha['tipo']);
         $atividade->setDescricao($linha['descricao']);
         $tabela_atividade[] = $atividade;
      }

      return $tabela_atividade;
   }

   public function SelectById(int $id)
   {
      $sql = "SELECT * FROM atividades WHERE id_atividade = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $query->execute(array($id));
      $linha = $query->fetch(\PDO::FETCH_ASSOC);
      $con = Conexao::desconectar();

      $atividade = new \MODEL\atividade();
      if ($linha) {
         $atividade->setId($linha['id_atividade']);
         $atividade->setData($linha['data_atividade']);
         $atividade->setTipo($linha['tipo']);
         $atividade->setDescricao($linha['descricao']);
      }

      return $atividade;
   }

   public function SelectByNome(string $nome)
   {
      $sql = "SELECT * FROM atividades WHERE tipo LIKE ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $query->execute(['%' . $nome . '%']);
      $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
      $con = Conexao::desconectar();
      $tabela_atividade = [];

      foreach ($registros as $linha) {
         $atividade = new \MODEL\atividade();
         $atividade->setId($linha['id_atividade']);
         $atividade->setData($linha['data_atividade']);
         $atividade->setTipo($linha['tipo']);
         $atividade->setDescricao($linha['descricao']);
         $tabela_atividade[] = $atividade;
      }

      return $tabela_atividade;
   }

   public function Insert(\MODEL\atividade $atividade)
   {
      $sql = "INSERT INTO atividades (data_atividade, tipo, descricao) VALUES (?, ?, ?);";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array(
         $atividade->getData(),
         $atividade->getTipo(),
         $atividade->getDescricao()
      ));
      $con = Conexao::desconectar();

      return $result;
   }

   public function Update(\MODEL\atividade $atividade)
   {
      $sql = "UPDATE atividades SET data_atividade = ?, tipo = ?, descricao = ? WHERE id_atividade = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array(
         $atividade->getData(),
         $atividade->getTipo(),
         $atividade->getDescricao(),
         $atividade->getId()
      ));
      $con = Conexao::desconectar();
      return $result;
   }

   public function Delete(int $id)
   {
      $sql = "DELETE FROM atividades WHERE id_atividade = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array($id));
      $con = Conexao::desconectar();
      return $result;
   }
}