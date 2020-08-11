
// Redirects 

$('.card-cliente').click(function(){
    window.location.href = 'clientes.php';
});

$('.card-produto').click(function(){
    window.location.href = 'produtos.php';
});

$('.card-venda').click(function(){
    window.location.href = 'vendas.php';
});

$('.create-cliente').click(function(){
    window.location.replace('form_cliente.php')
});

$('.create-produto').click(function(){
    window.location.replace('form_produto.php')
});

$('.create-venda').click(function(){
    window.location.replace('form_venda.php')
});

$('.update-cliente').click(function(){
    let id = $(this).attr('data-id');
    window.location.replace('form_cliente.php?id=' + id)
});

$('.update-produto').click(function(){
    let id = $(this).attr('data-id');
    window.location.replace('form_produto.php?id=' + id)
});

// Forms

$('#form-cliente').submit(function(e){
    e.preventDefault()

    let dados = new FormData(this)

    $.ajax({
        type: 'POST',
        url: 'controller/cliente.php',
        data: dados,
        processData: false,
        cache: false,
        contentType: false,
        success: function( data ) {
            window.location.replace('clientes.php')
        }
    });
});

$('.delete-cliente').click(function(e){
    let id = $(this).attr('data-id');

    if(confirm('Deseja realmente exlcuir esse cliente?')){
        $.ajax({
            type: 'POST',
            url: 'controller/cliente.php',
            data: {
                id: id,
                action: 'delete'
            },
            success: function( data ) {
                window.location.reload()
            }
        });
    }
});

$('.delete-produto').click(function(e){
    let id = $(this).attr('data-id');

    if(confirm('Deseja realmente exlcuir esse produto?')){
        $.ajax({
            type: 'POST',
            url: 'controller/produto.php',
            data: {
                id: id,
                action: 'delete'
            },
            success: function( data ) {
                window.location.reload()
            }
        });
    }
});

$('.delete-venda').click(function(e){
    let id = $(this).attr('data-id');

    if(confirm('Deseja realmente exlcuir essa venda?')){
        $.ajax({
            type: 'POST',
            url: 'controller/venda.php',
            data: {
                id: id,
                action: 'delete'
            },
            success: function( data ) {
                window.location.reload()
            }
        });
    }
});

$('#form-produto').submit(function(e){
    e.preventDefault()

    let dados = new FormData(this)

    $.ajax({
        type: 'POST',
        url: 'controller/produto.php',
        data: dados,
        processData: false,
        cache: false,
        contentType: false,
        success: function( data ) {
            window.location.replace('produtos.php')
        }
    });
});

$('#form-venda').submit(function(e){
    e.preventDefault()

    let dados = new FormData(this)

    $.ajax({
        type: 'POST',
        url: 'controller/venda.php',
        data: dados,
        processData: false,
        cache: false,
        contentType: false,
        success: function( data ) {
            window.location.replace('vendas.php')
        }
    });
});

// Action

$('.add-produto').click(function(e){
    e.preventDefault();
    
    $.ajax({
        type: 'POST',
        url: 'ajax/adicionar_produto.php',
        success: function( data ) {
            $('.rows').append(data);
        }
    });
});

$('.rows').on("click", ".delete-produto", function(e){
    e.preventDefault();
    
    $(this).parent('div').parent('div').remove();
});

$('.rows').on("keyup", ".quantidade", function() {
    let total = 0;
    $('.row').each(function(){
        let quantidade = $(this).find('.quantidade').val();
        let produtos = $(this).find('[opcoes]')
        let produto = produtos.children("option:selected")
        total += parseFloat(produto.attr('data-valor')) * quantidade
    })
    $('#total').val(total);
});

$('.rows').on("change", "#select-produto", function() {
    let total = 0;
    $('.row').each(function(){
        let quantidade = $(this).find('.quantidade').val();
        let produtos = $(this).find('[opcoes]')
        let produto = produtos.children("option:selected")
        total += parseFloat(produto.attr('data-valor')) * quantidade
    })
    $('#total').val(total);
});


$('.info-venda').click(function(){
    let id = $(this).attr('data-id');
    $('#info').modal("show");

    $.ajax({
        type: 'POST',
        url: 'ajax/show_venda.php',
        data: {CD_VENDA: id},
        success: function( data ) {
            $('.modal-body').html(data);
        }
    });
});