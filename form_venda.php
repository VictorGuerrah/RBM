<?php

require('view/header.php');
error_reporting(0);

$action = empty($_GET['id']) ? 'create' : 'update';
$clientes = getClientes();
$produtos = getProdutos();
// $venda = empty($_GET['id']) ? "" : getVenda($_GET['id']);

?>

<div class="container">
    <form id="form-venda">
        <input type="hidden" name="action" value="<?= $action?>">
        <input type="hidden" name="CD_VENDA" value="<?= $produto['CD_PRODUTO']?>">
        <div class="linha-1">
            <div class="rows">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Cliente</label>
                        <select name="CD_CLIENTE" class="form-control">
                            <?php foreach($clientes as $key => $value){?>
                                <option value="<?=$value['CD_CLIENTE']?>"><?= $value['NM_CLIENTE']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Produto</label>
                        <select name="produtos[]" class="form-control select-produto" opcoes>
                            <?php foreach($produtos as $key => $value){?>
                                <option value="<?=$value['CD_PRODUTO']?>" class="produto" data-valor="<?= $value['VL_PRODUTO']?>"><?= $value['NM_PRODUTO']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Quantidade</label>
                        <input type="number" min="1" step="1" class="form-control quantidade" name="quantidade[]" value="0" required>
                    </div>
                    <div class="form-group col-md-2 btn-produto">
                        <button class="btn btn-primary add-produto">Produto +</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="offset-md-5 col-2">
            <label>Total a pagar</label>
            <input type="text" class="form-control" id="total" name="VL_PRODUTO" value="0" disabled>
        </div>
        <div class="justify-content-md-center btn-salvar">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<?php

require('view/footer.php');

?>