<?php

require('view/header.html');
require('functions/functions.php');
error_reporting(0);

$clientes = getClientes();

?>

<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col"><button class="btn btn-success create-cliente" data-action="create" >Adicionar</button></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($clientes as $key => $value) {
            $endereco = $value['DC_ENDERECO'].', '.$value['NR_CASA'].' - '.$value['DC_BAIRRO'].', '.$value['DC_CIDADE']?>
            <tr>
                <th scope="row"><?= $value['CD_CLIENTE']?></th>
                <td><?= $value['NM_CLIENTE']?></td>
                <td><?= $value['DC_EMAIL']?></td>
                <td><?= $value['NR_TELEFONE']?></td>
                <td><?= $endereco?></td>
                <td>
                    <button class="btn btn-warning update-cliente" data-id="<?= $value['CD_CLIENTE']?>">Editar</button>
                    <button class="btn btn-danger delete-cliente" data-id="<?= $value['CD_CLIENTE']?>">Excluir</button>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<?php

require('view/footer.html');

?>