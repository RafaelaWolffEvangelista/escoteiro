<?php 
$id = $_GET['idEscoteiro'] ?? null;

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/menu.php";  
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/notificacoes.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/notificacoes.php";

use DAL\notificacoes;

$dalNotificacoes = new DAL\notificacoes();
$notificacoes = $dalNotificacoes->SelectByEscoteiroId($id);

echo $notificacoes[0]['nome_escoteiro'];
?>
<div class="container">
    <div class="card">
        <div class="card-title">Avisos e Cobranças de Mensalidades</div>
        <div style="margin-bottom: 20px;">
            <a href="inserir_notificacao.php" class="btn btn-primary">+ Emitir Alerta de Cobrança</a>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Data Envio</th>
                        <th>Escoteiro Relacionado</th>
                        <th>Tipo</th>
                        <th>Mensagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notificacoes as $n): ?>
                    <tr>
                        <td><?php echo $n['data_envio']; ?></td>
                        <td><strong><?php echo $n['nome_escoteiro'] ?? 'Geral / Todos'; ?></strong></td>
                        <td><span class="badge badge-atrasado"><?php echo $n['tipo']; ?></span></td>
                        <td><?php echo $n['mensagem']; ?></td>
                        <td>
                            <a href="operacao_remover_notificacao.php?id=<?php echo $n['id_notificacao']; ?>" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>