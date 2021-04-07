<?php 

require __DIR__.'/vendor/autoload.php';

$alertaCadastro = '';

define('TITLE','Editar Veículos');
define('BRAND','Veículos');

use \App\Entidy\Veiculo;
use \App\Entidy\Marca;
use   \App\Session\Login;

Login::requireLogin();


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}


$veiculo = Veiculo::getID($_GET['id']);



if(!$veiculo instanceof Veiculo){
    header('location: index.php?status=error');
    
    exit;
}

$id = $veiculo->marca_id;
$marcas = Marca::getMarcID($id);
// $marcas = Marca::getList();

if(isset($_POST['nome'])){

    
    $veiculo->nome = $_POST['nome'];
    $veiculo->marca_id = $_POST['marca_id'];
    $veiculo-> atualizar();

    header('location: veiculo-list.php?status=success');

    exit;
}

include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/veiculo/veiculo-form-edit.php';
include __DIR__.'/includes/layout/footer.php';