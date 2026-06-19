<?php 
$id = $_GET['idEscoteiro'] ?? null;

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";  
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/DAL/escoteiros.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/MODEL/escoteiro.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/DAL/notificacoes.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/MODEL/notificacoes.php";

use DAL\notificacoes;

$dalNotificacoes = new DAL\notificacoes();
$notificacao = $dalNotificacoes->SelectById($id);

echo $notificacao->getNome();
?>
<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-title">Editar Notificação / Aviso</div>
        <form action="operacao_editar_notificacao.php" method="POST">
            <input type="hidden" name="id_notificacao" value="<?php echo isset($_GET['id']) ? (int)$_GET['id'] : ''; ?>">
            
            <div class="form-group">
                <label>Alterar Destinatário</label>
                <select name="id_escoteiro" class="form-control" required>
                    <?php foreach($notificacao as $e): ?>
                        <option value="<?php echo $e['id_escoteiro']; ?>"><?php echo $e['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Tipo de Mensagem</label>
                <input type="text" name="tipo" value="Aviso de Cobrança Atualizado" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Mensagem de Aviso</label>
                <textarea name="mensagem" class="form-control" rows="4" required>Prezado responsável, solicitamos o comparecimento à secretaria do Grupo Escoteiro Cambuy para regularização de pendências.</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="tabela_notificacao.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>