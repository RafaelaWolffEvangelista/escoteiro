<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/escoteiro.php";

class Escoteiro
{
   public function Select()
   {
      $sql = "SELECT * FROM escoteiros;";
      $con = Conexao::conectar();
      $registros = $con->query($sql);
      $con = Conexao::desconectar();
      $tabela_escoteiro = [];
      foreach ($registros as $linha) {
         $escoteiro = new \MODEL\Escoteiro();
         $escoteiro->setId($linha['id_escoteiro']);
         $escoteiro->setNomeCompleto($linha['nome']);
         $escoteiro->setDataNascimento($linha['data_nascimento']);
         $escoteiro->setNomeResponsavel($linha['nome_responsavel']);
         $escoteiro->setBolsaFamilia((bool)$linha['bolsa_familia']);
         $escoteiro->setStatus($linha['status']);

         $tabela_escoteiro[] = $escoteiro;
      }

      return $tabela_escoteiro;
   }

   public function SelectById(int $id)
   {
      $sql = "SELECT * FROM escoteiros WHERE id_escoteiro = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $query->execute(array($id));
      $linha = $query->fetch(\PDO::FETCH_ASSOC);
      $con = Conexao::desconectar();

      $escoteiro = new \MODEL\Escoteiro();
      if ($linha) {
         $escoteiro->setId($linha['id_escoteiro']);
         $escoteiro->setNomeCompleto($linha['nome']);
         $escoteiro->setDataNascimento($linha['data_nascimento']);
         $escoteiro->setNomeResponsavel($linha['nome_responsavel']);
         $escoteiro->setBolsaFamilia((bool)$linha['bolsa_familia']);
         $escoteiro->setStatus($linha['status']);
      }

      return $escoteiro;
   }

   public function SelectByNome(string $nome)
   {
      $sql = "SELECT * FROM escoteiros WHERE nome LIKE ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $query->execute(['%' . $nome . '%']);
      $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
      $con = Conexao::desconectar();
      $tabela_escoteiro = [];
      foreach ($registros as $linha) {
         $escoteiro = new \MODEL\Escoteiro();
         $escoteiro->setId($linha['id_escoteiro']);
         $escoteiro->setNomeCompleto($linha['nome']);
         $escoteiro->setDataNascimento($linha['data_nascimento']);
         $escoteiro->setNomeResponsavel($linha['nome_responsavel']);
         $escoteiro->setBolsaFamilia((bool)$linha['bolsa_familia']);
         $escoteiro->setStatus($linha['status']);

         $tabela_escoteiro[] = $escoteiro;
      }

      return $tabela_escoteiro;
   }

   public function Insert(\MODEL\Escoteiro $escoteiro)
   {
      $sql = "INSERT INTO escoteiros (nome, data_nascimento, nome_responsavel, bolsa_familia) VALUES (?, ?, ?, ?);";

      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute([
          $escoteiro->getNomeCompleto(),
          $escoteiro->getDataNascimento(),
          $escoteiro->getNomeResponsavel(),
          $escoteiro->getBolsaFamilia() ? 1 : 0
      ]);
      $con = Conexao::desconectar();

      return $result;
   }

   public function Update(\MODEL\Escoteiro $escoteiro)
   {
      $sql = "UPDATE escoteiros SET nome = ?, data_nascimento = ?, nome_responsavel = ?, bolsa_familia = ? WHERE id_escoteiro = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array(
          $escoteiro->getNomeCompleto(),
          $escoteiro->getDataNascimento(),
          $escoteiro->getNomeResponsavel(),
          $escoteiro->getBolsaFamilia() ? 1 : 0,
          $escoteiro->getId()
      ));
      $con = Conexao::desconectar();
      return $result;
   }

   public function Delete(int $id)
   {
      $sql = "DELETE FROM escoteiros WHERE id_escoteiro = ?;";
      $con = Conexao::conectar();
      $query = $con->prepare($sql);
      $result = $query->execute(array($id));
      $con = Conexao::desconectar();
      return $result;
   }
}