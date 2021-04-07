<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entidy\Marca;
use   \App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$usuarios = Marca::getID($_GET['id']);

if(!$usuarios instanceof Marca){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $usuarios->excluir();

    header('location: marca-list.php?status=success');

    exit;
}

