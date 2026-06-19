<?php 
$id = $_GET['idChefes'] ?? null;

include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/VIEW/shared_nav.php";  
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/chefes_voluntario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/chefes.php";

use DAL/chefes_voluntario;

$dalChefes = new DAL\chefes_voluntario();
$chefe = $dalChefes->SelectById($id);

echo $chefe->getNome();
?>
<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-title">Editar Voluntário</div>
        <form action="operacao_editar_chefes.php" method="POST">
            <input type="hidden" name="id_voluntario" value="<?php echo $c->getIdVoluntario(); ?>">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" value="<?php echo $c->getNome(); ?>" class="form-control" oninput="validarApenasLetras(this)" required>
            </div>
            <div class="form-group">
                <label>Função</label>
                <input type="text" name="funcao" value="<?php echo $c->getFuncao(); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefone" value="<?php echo $c->getTelefone(); ?>" class="form-control" oninput="validarApenasNumeros(this)">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Ativo" <?php echo $c->getStatus()=='Ativo'?'selected':''; ?>>Ativo</option>
                    <option value="Inativo" <?php echo $c->getStatus()=='Inativo'?'selected':''; ?>>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
</body>
</html>