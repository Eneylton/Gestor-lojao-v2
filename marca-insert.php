<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE','Nova Marca');
define('BRAND','Cadastrar Marca');

use \App\Entidy\Marca;
use   \App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

if(isset($_POST['nome'])){

        $item = new Marca;
        $item->nome = $_POST['nome'];    
        $item->cadastar();

        header('location: marca-list.php?status=success');
        exit;
    }

include __DIR__.'/includes/layout/header.php';
include __DIR__.'/includes/layout/top.php';
include __DIR__.'/includes/layout/menu.php';
include __DIR__.'/includes/layout/content.php';
include __DIR__.'/includes/marca/marca-form-insert.php';
include __DIR__.'/includes/layout/footer.php';