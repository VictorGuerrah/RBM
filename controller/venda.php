<?php

require('../functions/functions.php');
require('../database/connection.php');

echo '<pre>';
echo print_r($_POST);
echo '</pre>';

switch ($_POST['action']) {
    case 'create':
        insertVenda($_POST);
        break;
    case 'update':
        // updateVenda($_POST);
        break;
    case 'delete':
        deleteVenda($_POST['id']);
        break;
    
}