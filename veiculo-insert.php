<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Novo Veículo');
define('BRAND','Cadastrar Veículo');

use \App\Entidy\Veiculo;
use \App\Entidy\Marca;
use   \App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

$marcas = Marca::getList();

if(isset($_POST['nome'])){

        $item = new Veiculo;
        $item->nome = $_POST['nome'];    
        $item->marca_id = $_POST['marca_id'];    
        $item->cadastar();

        header('location: veiculo-list.php?status=success');
        exit;
    }

include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/veiculo/veiculo-form-insert.php';
include __DIR__.'/includes/layout/footer.php';