<?php

require('view/header.html');
require('functions/functions.php');
error_reporting(0);

$produtos = getProdutos();

?>

<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor</th>
                <th scope="col"><button class="btn btn-success create-produto" data-action="create" >Adicionar</button></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($produtos as $key => $value) {?>
            <tr>
                <th scope="row"><?= $value['CD_PRODUTO']?></th>
                <td><?= $value['NM_PRODUTO']?></td>
                <td><?= $value['VL_PRODUTO']?></td>
                <td>
                    <button class="btn btn-warning update-produto" data-id="<?= $value['CD_PRODUTO']?>">Editar</button>
                    <button class="btn btn-danger delete-produto" data-id="<?= $value['CD_PRODUTO']?>">Excluir</button>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<?php

require('view/footer.html');

?>