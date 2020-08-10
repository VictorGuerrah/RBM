<?php

require('../functions/functions.php');
require('../database/connection.php');

// echo '<pre>';
// echo print_r($_POST);
// echo '</pre>';

switch ($_POST['action']) {
    case 'create':
        insertCliente($_POST);
        break;
    case 'update':
        updateCliente($_POST);
        break;
    case 'delete':
        deleteCliente($_POST['id']);
        break;
    
}