<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/chefes.php";

class chefes
{
   public function Select()
   {
      $sql = "SELECT * FROM chefes_voluntarios;";
      $con = Conexao::conectar();
      $registros = $con->query($sql);
      $con = Conexao::desconectar();
      $tabela_chefes = [];

      foreach ($registros as $linha) {
         $chefes = new \MODEL\chefes();
         $chefes->setId($linha['id_voluntario']);
         $chefes->setNome($linha['nome']);
         $chefes->setRamo($linha['funcao']);
         $chefes->setTelefone($linha['telefone']);
         $chefes->setStatus($linha['status']);
         $chefes->setIdUsuario($linha['id_usuario']);

         $tabela_chefes[] = $chefes;
      }

      return $tabela_chefes;
   }

   public function SelectById(int $id)
   {
      $sql = "SELECT * FROM chefes_voluntarios WHERE id_voluntario = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $query->execute(array($id));
      $linha = $query->fetch(\PDO::FETCH_ASSOC);
      $con = Conexao::desconectar();

      $chefes = new \MODEL\chefes();
      if ($linha) {
         $chefes->setId($linha['id_voluntario']);
         $chefes->setNome($linha['nome']);
         $chefes->setRamo($linha['funcao']);
         $chefes->setTelefone($linha['telefone']);
         $chefes->setStatus($linha['status']);
         $chefes->setIdUsuario($linha['id_usuario']);
      }

      return $chefes;
   }

   public function SelectByNome(string $nome)
   {
      $sql = "SELECT * FROM chefes_voluntarios WHERE nome LIKE ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $query->execute(['%' . $nome . '%']);
      $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
      $con = Conexao::desconectar();
      $tabela_chefes = [];

      foreach ($registros as $linha) {
         $chefes = new \MODEL\chefes();
         $chefes->setId($linha['id_voluntario']);
         $chefes->setNome($linha['nome']);
         $chefes->setRamo($linha['funcao']);
         $chefes->setTelefone($linha['telefone']);
         $chefes->setStatus($linha['status']);
         $chefes->setIdUsuario($linha['id_usuario']);

         $tabela_chefes[] = $chefes;
      }

      return $tabela_chefes;
   }

   public function Insert(\MODEL\chefes $chefes)
   {
      $sql = "INSERT INTO chefes_voluntarios (nome, funcao, telefone, status, id_usuario) VALUES (?, ?, ?, ?, ?);";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array(
         $chefes->getNome(),
         $chefes->getRamo(),
         $chefes->getTelefone(),
         $chefes->getStatus(),
         $chefes->getIdUsuario()
      ));
      $con = Conexao::desconectar();

      return $result;
   }

   public function Update(\MODEL\chefes $chefes)
   {
      $sql = "UPDATE chefes_voluntarios SET nome = ?, funcao = ?, telefone = ?, status = ?, id_usuario = ? WHERE id_voluntario = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array(
         $chefes->getNome(),
         $chefes->getRamo(),
         $chefes->getTelefone(),
         $chefes->getStatus(),
         $chefes->getIdUsuario(),
         $chefes->getId()
      ));
      $con = Conexao::desconectar();
      return $result;
   }

   public function Delete(int $id)
   {
      $sql = "DELETE FROM chefes_voluntarios WHERE id_voluntario = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array($id));
      $con = Conexao::desconectar();
      return $result;
   }
}