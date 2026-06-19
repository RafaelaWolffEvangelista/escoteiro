<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";  
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/DAL/escoteiros.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/MODEL/escoteiro.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/DAL/notificacoes.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/escoteiro/MODEL/notificacoes.php";

$escDAL = new EscoteiroDAL();
$escoteiros = $escDAL->selectAll();
?>
<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-title">Gerar Notificação</div>
        <form action="operacao_inserir_notificacao.php" method="POST">
            <div class="form-group">
                <label>Selecionar Escoteiro Destinatário</label>
                <select name="id_escoteiro" class="form-control" required>
                    <?php foreach($escoteiros as $e): ?>
                        <option value="<?php echo $e['id_escoteiro']; ?>"><?php echo $e['nome']; ?> (<?php echo $e['status']; ?>)</option>
                    <?php endhead; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tipo de Mensagem</label>
                <input type="text" name="tipo" value="Cobrança Mensalidade" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mensagem de Aviso</label>
                <textarea name="mensagem" class="form-control" rows="3" required>Prezado responsável, identificamos pendência na última mensalidade do grupo escoteiro. Por favor, regularize.</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Notificação</button>
        </form>
    </div>
</div>
</body>
</html>