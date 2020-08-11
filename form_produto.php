<?php

require('view/header.php');
error_reporting(0);

$action = empty($_GET['id']) ? 'create' : 'update';
$produto = empty($_GET['id']) ? "" : getProduto($_GET['id']);

?>

<div class="container">
    <form id="form-produto">
        <input type="hidden" name="action" value="<?= $action?>">
        <input type="hidden" name="CD_PRODUTO" value="<?= $produto['CD_PRODUTO']?>">
        <div class="row">
            <div class="form-group col-md-5">
                <label>Nome do Produto</label>
                <input type="text" class="form-control" name="NM_PRODUTO" value="<?= $produto['NM_PRODUTO']?>" required>
            </div>
            <div class="form-group col-md-4">
                <label>Valor Unitário</label>
                <input type="number" min="1" step="any" class="form-control" name="VL_PRODUTO" value="<?= $produto['VL_PRODUTO']?>" required>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<?php

require('view/footer.php');

?>