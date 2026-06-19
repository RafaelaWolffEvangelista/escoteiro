<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/escoteiros.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/escoteiro.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/shared_nav.php";

use DAL\escoteiros;

$dalEscoteiros = new DAL\escoteiros();

if (isset($_GET['busca_nome']) && !empty($_GET['busca_nome'])) {
    $termo = $_GET['busca_nome'];
    $tabela_escoteiro = $dalEscoteiros->SelectByNome($termo);
} else {
    $termo = "";
    $tabela_escoteiro = $dalEscoteiros->Select();
}
?>
<div class="container">
    <div class="card">
        <div class="card-title">Escoteiros Cadastrados</div>
        <div style="margin-bottom: 20px;">
            <a href="inserir_escoteiro.php" class="btn btn-primary">+ Novo Escoteiro</a>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Responsável</th>
                        <th>Telefone</th>
                        <th>Atividades Part.</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tabela_escoteiro as $e): 
                        $atividadesCount = $dalEscoteiros->contarAtividadesParticipando($e['id_escoteiro']);
                    ?>
                    <tr>
                        <td><?php echo $e['id_escoteiro']; ?></td>
                        <td><strong><?php echo $e['nome']; ?></strong></td>
                        <td><?php echo $e['nome_responsavel']; ?></td>
                        <td><?php echo $e['telefone_responsavel']; ?></td>
                        <td><span class="badge" style="background:#ddd; color:black;"><?php echo $atividadesCount; ?> ativ.</span></td>
                        <td><span class="badge badge-<?php echo strtolower($e['status']); ?>"><?php echo $e['status']; ?></span></td>
                        <td>
                            <a href="detalhes_escoteiro.php?id=<?php echo $e['id_escoteiro']; ?>" class="btn btn-secondary">🔍</a>
                            <a href="editar_escoteiro.php?id=<?php echo $e['id_escoteiro']; ?>" class="btn btn-primary">✏️</a>
                            <a href="operacao_remover_escoteiro.php?id=<?php echo $e['id_escoteiro']; ?>" class="btn btn-danger" onclick="return confirm('Excluir?')">🗑️</a>
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