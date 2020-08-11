<?php
    require('../functions/functions.php');
    require('../database/connection.php');
    error_reporting(0);

    $produtos = getProdutos();

?>

<div class="row">
    <div class="form-group offset-md-4 col-md-4"> 
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
        <button class="btn btn-danger delete-produto">Produto -</button> 
    </div> 
</div>