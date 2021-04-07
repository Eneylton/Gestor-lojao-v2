<?php 

require __DIR__.'/vendor/autoload.php';



$alertaCadastro = '';

define('TITLE','Editar Marca');
define('BRAND','Marca');

use \App\Entidy\Marca;
use   \App\Session\Login;

Login::requireLogin();


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$marca = Marca::getID($_GET['id']);


if(!$marca instanceof Marca){
    header('location: index.php?status=error');

    exit;
}



if(isset($_POST['nome'])){
    
    $marca->nome = $_POST['nome'];
    $marca-> atualizar();

    header('location: marca-list.php?status=success');

    exit;
}

include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/marca/marca-form-edit.php';
include __DIR__.'/includes/layout/footer.php';