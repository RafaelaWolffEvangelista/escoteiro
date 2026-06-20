<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/chefes.php";

use MODEL\ChefesVoluntarios;

class ChefesVoluntariosDAL {

    public function insert(ChefesVoluntarios $chefe): void {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("INSERT INTO chefes_voluntarios (nome, funcao, telefone, status, id_usuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$chefe->getNome(), $chefe->getFuncao(), $chefe->getTelefone(), $chefe->getStatus(), $chefe->getIdUsuario()]);
    }

    public function update(ChefesVoluntarios $chefe): void {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("UPDATE chefes_voluntarios SET nome = ?, funcao = ?, telefone = ?, status = ?, id_usuario = ? WHERE id_voluntario = ?");
        $stmt->execute([$chefe->getNome(), $chefe->getFuncao(), $chefe->getTelefone(), $chefe->getStatus(), $chefe->getIdUsuario(), $chefe->getIdVoluntario()]);
    }

    public function delete(int $id): void {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("DELETE FROM chefes_voluntarios WHERE id_voluntario = ?");
        $stmt->execute([$id]);
    }

    public function findById(int $id): ?ChefesVoluntarios {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("SELECT * FROM chefes_voluntarios WHERE id_voluntario = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) return null;
        return new ChefesVoluntarios($row['id_voluntario'], $row['nome'], $row['funcao'], $row['telefone'], $row['status'], $row['id_usuario']);
    }

    public function selectAll(): array {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->query("SELECT * FROM chefes_voluntarios ORDER BY nome ASC");
        return $stmt->fetchAll();
    }
}
?>