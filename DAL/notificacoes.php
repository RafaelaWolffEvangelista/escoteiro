<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/notificacoes.php";

class NotificacoesDAL {
    public function insert(Notificacoes $notificacao): void {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("INSERT INTO notificacoes (tipo, mensagem, data_envio, id_escoteiro) VALUES (?, ?, ?, ?)");
        $stmt->execute([$notificacao->getTipo(), $notificacao->getMensagem(), $notificacao->getDataEnvio(), $notificacao->getIdEscoteiro()]);
    }

    public function selectAll(): array {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->query("SELECT n.*, e.nome as nome_escoteiro FROM notificacoes n LEFT JOIN escoteiros e ON n.id_escoteiro = e.id_escoteiro ORDER BY n.data_envio DESC");
        return $stmt->fetchAll();
    }
    
    public function delete(int $id): void {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("DELETE FROM notificacoes WHERE id_notificacao = ?");
        $stmt->execute([$id]);
    }
}
?>