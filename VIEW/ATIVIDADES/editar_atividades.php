<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/shared_nav.php";  

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/atividades.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/atividade.php";

$id = $_GET['id'] ?? null;

$dalAtividade = new AtividadesDAL();
$atividade = $dalAtividade->findById((int)$id);

$lista_escoteiros = [];
$lista_chefes = [];

if ($atividade) {
    $pdo = Conexao::getConexao();

    $sqlEscoteiros = "
        SELECT e.nome 
        FROM escoteiros e
        INNER JOIN atividade_escoteiro ae ON ae.id_escoteiro = e.id_escoteiro
        WHERE ae.id_atividade = ?
    ";
    $stmtE = $pdo->prepare($sqlEscoteiros);
    $stmtE->execute([$id]);
    $lista_escoteiros = $stmtE->fetchAll();

    $sqlChefes = "
        SELECT c.nome 
        FROM chefes_voluntarios c
        INNER JOIN atividade_chefe ac ON ac.id_usuario = c.id_usuario
        WHERE ac.id_atividade = ?
    ";
    $stmtC = $pdo->prepare($sqlChefes);
    $stmtC->execute([$id]);
    $lista_chefes = $stmtC->fetchAll();
}
?>
<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-title">Editar Detalhes da Atividade</div>
        
        <?php if ($atividade): ?>
        <form action="operacao_editar_atividades.php" method="POST">
            <input type="hidden" name="id_atividade" value="<?php echo $atividade->getIdAtividade(); ?>">
            
            <div class="form-group">
                <label>Data</label>
                <input type="date" name="data_atividade" value="<?php echo $atividade->getDataAtividade(); ?>" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Tipo</label>
                <input type="text" name="tipo" value="<?php echo $atividade->getTipo(); ?>" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="descricao" class="form-control" rows="4"><?php echo $atividade->getDescricao(); ?></textarea>
            </div>

            <div class="form-group" style="margin-top: 15px;">
                <label>Escoteiros Inscritos nesta Atividade</label>
                <div class="form-control" style="background: #f7fafc; height: auto; min-height: 50px; padding: 10px;">
                    <?php if (count($lista_escoteiros) > 0): ?>
                        <ul style="margin: 0; padding-left: 20px;">
                            <?php foreach($lista_escoteiros as $esc): ?>
                                <li><strong><?php echo $esc['nome']; ?></strong></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <span class="text-muted">Nenhum escoteiro inscrito ainda.</span>
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Salvar Alterações</button>
        </form>
        <?php else: ?>
            <p class="text-danger">Registro não encontrado para edição.</p>
        <?php endif; ?>
    </div>
</div>

<script src="/escoteiro/VIEW/js/javascript.js"></script>
</body>
</html>