<?php
require __DIR__.'/vendor/autoload.php';

use  \App\Db\Pagination;
use App\Entidy\Cliente;
use   \App\Session\Login;

define('TITLE','Lista de Veículos');
define('BRAND','Veículos');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($buscar) ? 'c.nome LIKE "%'.str_replace(' ','%',$buscar).'%" 
                       or 
                       c.telefone LIKE "%'.str_replace(' ','%',$buscar).'%"
                       or 
                       c.email LIKE "%'.str_replace(' ','%',$buscar).'%"
                       or 
                       c.placa LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Cliente:: getCli($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 5);

$listar = Cliente::getInnerJoin($where, 'id desc',$pagination->getLimit());


include __DIR__ . '/includes/layout/header.php';
include __DIR__ . '/includes/layout/top.php';
include __DIR__ . '/includes/layout/menu.php';
include __DIR__ . '/includes/layout/content.php';
include __DIR__ . '/includes/cliente/cliente-form-list.php';
include __DIR__ . '/includes/layout/footer.php';
