<?php

namespace App\Entidy;

use \App\Db\Database;
use \PDO;

class Cliente
{

    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $placa;
    public $veiculo_id;
    public $veiculo;
    public $usuarios_id;

    public function cadastar()
    {

        $obdataBase = new Database('clientes');

        $this->id = $obdataBase->insert([

            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'placa' => $this->placa,
            'veiculo_id' => $this->veiculo_id,
            'usuarios_id' => $this->usuarios_id,

        ]);

        return true;

    }

    public static function getList($where = null, $order = null, $limit = null)
    {

        return (new Database('clientes'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);

    }

    public static function getInnerJoin($where = null, $order = null, $limit = null)
    {

        return (new Database('clientes'))->innerjoin($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);

    }

    public static function getQtd($where = null)
    {

        return (new Database('clientes'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;

    }

    public static function getCli($where = null)
    {

        return (new Database('clientes'))->qtdCli($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;

    }

    public static function getID($id)
    {
        return (new Database('clientes'))->select('id = ' . $id)
            ->fetchObject(self::class);

    }

    public function atualizar()
    {
        return (new Database('clientes'))->update('id = ' . $this->id, [

            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'placa' => $this->placa,
            'veiculo_id' => $this->veiculo_id,
            'usuarios_id' => $this->usuarios_id,

        ]);

    }

    public function excluir()
    {
        return (new Database('clientes'))->delete('id = ' . $this->id);

    }

    public static function getPdf()
    {

        return (new Database('clientes'))->pdf($where = null)
            ->fetchAll(PDO::FETCH_CLASS, self::class);

    }

}
