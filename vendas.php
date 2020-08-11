<?php

require('view/header.php');
// error_reporting(0);

$vendas = getVendas();

?>

<div class="container">
    <table class="table table-striped table-bordered table-hover table-responsive-md">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data</th>
                <th scope="col"><button class="btn btn-success create-venda" data-action="create" >Adicionar</button></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($vendas as $key => $value) {?>
            <tr>
                <th scope="row"><?= $value['CD_VENDA']?></th>
                <td><?= $value['NM_CLIENTE']?></td>
                <td><?= $value['DT_VENDA']?></td>
                <td>
                    <button class="btn btn-primary info-venda" data-id="<?= $value['CD_VENDA']?>">Info</button>
                    <button class="btn btn-warning update-venda" data-id="<?= $value['CD_VENDA']?>">Editar</button>
                    <button class="btn btn-danger delete-venda" data-id="<?= $value['CD_VENDA']?>">Excluir</button>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<?php

require('view/footer.php');

?>

<!-- Modal -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>