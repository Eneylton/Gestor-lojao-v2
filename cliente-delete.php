<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Cliente;
use   \App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$clientes = Cliente::getID($_GET['id']);

if(!$clientes instanceof Cliente){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $clientes->excluir();

    header('location: cliente-list.php?status=success');

    exit;
}

