<?php 

require __DIR__.'/vendor/autoload.php';

$alertaCadastro = '';

define('TITLE','Editar Cliente');
define('BRAND','Cliente');

use \App\Entidy\Cliente;
use \App\Entidy\Veiculo;
use   \App\Session\Login;

Login::requireLogin();


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}


$cliente = Cliente::getID($_GET['id']);


if(!$cliente instanceof Cliente){
    header('location: index.php?status=error');
    
    exit;
}

$id = $cliente->id;

$veiculos = Veiculo::getVeiID($id);

if(isset($_POST['nome'])){

    
    $cliente->nome = $_POST['nome'];
    $cliente->telefone = $_POST['telefone'];
    $cliente->email = $_POST['email'];
    $cliente->placa = $_POST['placa'];
    $cliente->veiculo_id = $_POST['veiculo_id'];
    $cliente-> atualizar();

    header('location: cliente-list.php?status=success');

    exit;
}

include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/cliente/cliente-form-edit.php';
include __DIR__.'/includes/layout/footer.php';