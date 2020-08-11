<?php

require('../functions/functions.php');
require('../database/connection.php');
error_reporting(0);

$venda = getVenda($_POST['CD_VENDA']);


?>

<div class="container">
    <table class="table table-striped table-bordered table-hover table-responsive-md">
        <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($venda as $key => $value) {
            $total += $value['QTD_PRODUTO'] * $value['VL_PRODUTO']?>
            <tr>
                <td><?= $value['NM_PRODUTO']?></td>
                <td><?= $value['QTD_PRODUTO']?></td>
                <td><?= $value['QTD_PRODUTO'].' x R$'.$value['VL_PRODUTO']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <hr>
    <h6>Valor Total: R$<?= $total?></h6>
</div>