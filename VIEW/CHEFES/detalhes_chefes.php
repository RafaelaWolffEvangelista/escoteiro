<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/shared_nav.php";  

$id = $_GET['id'];

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/chefes_voluntario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/chefes.php";

use DAL/chefes_voluntario;


$dalChefes = new DAL\chefes_voluntario();
$chefe = $dalChefes->SelectById($id);
?>
<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-title">Detalhes do Chefe / Voluntário</div>
        <hr style="border: 0; height: 1px; background: #e2e8f0; margin-bottom: 20px;">
        
        <div class="form-group">
            <p><strong>Nome Completo:</strong> <?php echo $chefe->getNome(); ?></p>
        </div>
        <div class="form-group">
            <p><strong>Função / Cargo:</strong> <?php echo $chefe->getFuncao(); ?></p>
        </div>
        <div class="form-group">
            <p><strong>Telefone de Contato:</strong> <?php echo $chefe->getTelefone() ? $chefe->getTelefone() : 'Não informado'; ?></p>
        </div>
        <div class="form-group">
            <p><strong>Status do Registro:</strong> 
                <span class="badge" style="background: <?php echo $chefe->getStatus() == 'Ativo' ? '#e8f5e9; color: var(--success);' : '#ffebee; color: var(--danger);'; ?>">
                    <?php echo $chefe->getStatus(); ?>
                </span>
            </p>
        </div>
        
        <br>
        <div style="display: flex; gap: 10px;">
            <a href="editar_chefes.php?id=<?php echo $chefe->getIdVoluntario(); ?>" class="btn btn-primary">Editar Dados</a>
            <a href="tabela_chefes.php" class="btn btn-secondary">Voltar para a Lista</a>
        </div>
    </div>
</div>
</body>
</html>