<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/atividade.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/shared_nav.php";

// Mantendo a nomenclatura exata da sua classe
$dalAtividade = new AtividadesDAL();

if (isset($_GET['busca_nome']) && !empty($_GET['busca_nome'])) {
    $termo = $_GET['busca_nome'];
    $tabelaAtividade = $dalAtividade->selectAll();
} else {
    $termo = "";
    $tabelaAtividade = $dalAtividade->selectAll(); 
}
?>
<div class="container">
    <div class="card">
        <div class="card-title">Atividades e Calendário de Eventos</div>
        <div style="margin-bottom: 20px;">
            <a href="inserir_atividades.php" class="btn btn-primary">+ Nova Atividade</a>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Presenças Estimadas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tabelaAtividade as $a): ?>
                    <tr>
                        <td><?php echo date('d/m/Y', strtotime($a['data_atividade'])); ?></td>
                        <td><span class="badge" style="background:#eae6ff; color:#4c3f91;"><?php echo $a['tipo']; ?></span></td>
                        <td><?php echo $a['descricao']; ?></td>
                        <td>
                            <small style="color: green; font-weight:bold;">✓ 12 Escoteiros escalados</small><br>
                            <small style="color: #555;">• Chefia Responsável ativa</small>
                        </td>
                        <td>
                            <a href="detalhes_atividades.php?id=<?php echo $a['id_atividade']; ?>" class="btn btn-secondary">🔍</a>
                            <a href="editar_atividades.php?id=<?php echo $a['id_atividade']; ?>" class="btn btn-primary">✏️</a>
                            <a href="operacao_remover_atividades.php?id=<?php echo $a['id_atividade']; ?>" class="btn btn-danger" onclick="return confirm('Excluir atividade?')">🗑️</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="/escoteiro/VIEW/js/javascript.js"></script>
</body>
</html>