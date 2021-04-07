<?php
require __DIR__.'/vendor/autoload.php';

use  \App\Db\Pagination;
use App\Entidy\Marca;
use   \App\Session\Login;

define('TITLE','Listar Marcas');
define('BRAND','Marcas');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($buscar) ? 'nome LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Marca:: getQtd($where);


$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 5);

$usuarios = Marca::getList($where, 'id desc',$pagination->getLimit());


include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/marca/marca-form-list.php';
include __DIR__ . '/includes/layout/footer.php';
