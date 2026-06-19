<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";  

$id = $_GET['id'];
 
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/DAL/escoteiros.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/MODEL/escoteiro.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/DAL/notificacoes.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/MODEL/notificacoes.php";

use DAL\notificacoes;


$dalNotificacoes = new DAL\notificacoes();
$notificacao = $dalNotificacoes->SelectById($id);

$pdo = Conexao::getConexao();
$stmt = $pdo->prepare("SELECT n.*, e.nome as nome_escoteiro FROM notificacoes n LEFT JOIN escoteiros e ON n.id_escoteiro = e.id_escoteiro WHERE n.id_notificacao = ?");
$stmt->execute([$id]);
$notificacao = $stmt->fetch();

if (!$notificacao) {
    echo "<div class='container'><div class='card'>Notificação não encontrada.</div></div>";
    exit();
}
?>
<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-title">Detalhes de Notificação</div>
        <hr style="border: 0; height: 1px; background: #e2e8f0; margin-bottom: 20px;">
        
        <div class="form-group">
            <p><strong>Data e Hora de Envio:</strong> <?php echo date('d/m/Y H:i:s', strtotime($notificacao['data_envio'])); ?></p>
        </div>
        <div class="form-group">
            <p><strong>Escoteiro Alvo:</strong> <strong><?php echo $notificacao['nome_escoteiro'] ? $notificacao['nome_escoteiro'] : 'Envio Geral / Todos'; ?></strong></p>
        </div>
        <div class="form-group">
            <p><strong>Categoria/Tipo:</strong> <span class="badge badge-atrasado"><?php echo $notificacao['tipo']; ?></span></p>
        </div>
        <div class="form-group">
            <p><strong>Conteúdo do Comunicado enviado aos Responsáveis:</strong></p>
            <div style="background: #fffeb3; color: #5c3a00; padding: 15px; border-radius: 8px; border: 1px solid #f5e7a1; margin-top: 5px; font-style: italic;">
                "<?php echo $notificacao['mensagem']; ?>"
            </div>
        </div>
        
        <br>
        <div style="display: flex; gap: 10px;">
            <a href="editar_notificacao.php?id=<?php echo $notificacao['id_notificacao']; ?>" class="btn btn-primary">Modificar Texto</a>
            <a href="tabela_notificacao.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
</body>
</html>