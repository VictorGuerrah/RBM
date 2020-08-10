<?php

require('../functions/functions.php');
require('../database/connection.php');

// echo '<pre>';
// echo print_r($_POST);
// echo '</pre>';

switch ($_POST['action']) {
    case 'create':
        insertProduto($_POST);
        break;
    case 'update':
        updateProduto($_POST);
        break;
    case 'delete':
        deleteProduto($_POST['id']);
        break;
    
}