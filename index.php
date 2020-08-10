<?php

require('view/header.html');

?>
<div class="container">
    <div class="card-deck">
    
        <div class="card card-cliente" style="width: 18rem;">
            <img src="img/clientes.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Gerenciamento de clientes</p>
            </div>
        </div>

        <div class="card card-produto" style="width: 18rem;">
            <img src="img/produtos.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Produtos</h5>
                <p class="card-text">Gerenciamento de produtos</p>
            </div>
        </div>

        <div class="card card-venda" style="width: 18rem;">
            <img src="img/vendas.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Vendas</h5>
                <p class="card-text">Gerenciamento de vendas</p>
            </div>
        </div>
        
    </div>
</div>

<?php

require('view/footer.html');

?>