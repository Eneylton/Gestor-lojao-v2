<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Veiculo{
    
    public $id;
    public $nome;
    public $marca;
    public $marca_id;
   
    public function cadastar(){

        $obdataBase = new Database('veiculos');  
        
        $this->id = $obdataBase->insert([
          
            'nome'            => $this->nome,
            'marca_id'        => $this->marca_id
        ]);

        return true;

    }

public static function getList($where = null, $order = null, $limit = null){

    return (new Database ('veiculos'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getInnerJoin($where = null, $order = null, $limit = null){

    return (new Database ('veiculos'))->innerjoinVeiculo($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQtd($where = null){

    return (new Database ('veiculos'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getVeiID($id)
{
    return (new Database('veiculos'))->select('id = ' . $id)
        ->fetchAll(PDO::FETCH_CLASS, self::class);
}


public static function getID($id){
    return (new Database ('veiculos'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}

public function atualizar(){
    return (new Database ('veiculos'))->update('id = ' .$this-> id, [

        'nome'            => $this->nome,
        'marca_id'        => $this->marca_id
    ]);
  
}

public function excluir(){
    return (new Database ('veiculos'))->delete('id = ' .$this->id);
  
}


public static function getPdf(){

    return (new Database ('veiculos'))->pdf($where = null)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

}