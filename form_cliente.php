<?php

require('view/header.php');
error_reporting(0);

$action = empty($_GET['id']) ? 'create' : 'update';
$cliente = empty($_GET['id']) ? "" : getCliente($_GET['id']);

?>

<div class="container">
    <form id="form-cliente">
        <input type="hidden" name="action" value="<?= $action?>">
        <input type="hidden" name="CD_CLIENTE" value="<?= $cliente['CD_CLIENTE']?>">
        <div class="row">
            <div class="form-group col-md-5">
                <label>Nome Completo</label>
                <input type="text" class="form-control" name="NM_CLIENTE" value="<?= $cliente['NM_CLIENTE']?>" required>
            </div>
            <div class="form-group col-md-4">
                <label>Email</label>
                <input type="email" class="form-control" name="DC_EMAIL" value="<?= $cliente['DC_EMAIL']?>" required>
            </div>
            <div class="form-group col-md-3">
                <label>Telefone</label>
                <input type="tel" class="form-control telefone" name="NR_TELEFONE" value="<?= $cliente['NR_TELEFONE']?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5">
                <label>Rua</label>
                <input type="text" class="form-control" name="DC_ENDERECO" value="<?= $cliente['DC_ENDERECO']?>" required>
            </div>
            <div class="form-group col-md-2">
                <label>Número</label>
                <input type="number" class="form-control" name="NR_CASA" value="<?= $cliente['NR_CASA']?>" required>
            </div>
            <div class="form-group col-md-2">
                <label>Complemento</label>
                <input type="text" class="form-control" name="DC_COMPLEMENTO" value="<?= $cliente['DC_COMPLEMENTO']?>">
            </div>
            <div class="form-group col-md-3">
                <label>Bairro</label>
                <input type="text" class="form-control" name="DC_BAIRRO" value="<?= $cliente['DC_BAIRRO']?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5">
                <label>Cidade</label>
                <input type="text" class="form-control" name="DC_CIDADE" value="<?= $cliente['DC_CIDADE']?>" required>
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