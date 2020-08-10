
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

$('.update-cliente').click(function(){
    let id = $(this).attr('data-id');
    window.location.replace('form_cliente.php?id=' + id)
});

$('.update-produto').click(function(){
    let id = $(this).attr('data-id');
    window.location.replace('form_produto.php?id=' + id)
});

// Ajax

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

