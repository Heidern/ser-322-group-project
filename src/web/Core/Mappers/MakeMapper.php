<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\Make;
use Core\Shared\PdoFactory;

interface IMakeMapper {
    public function getAllMakes () : array;
    public function getMakeById (int $id) : Make;
    public function addMake (Make $make);
    public function updateMake (Make $make);    
}

class MakeMapper implements IMakeMapper {

    private static function mapDbRowToMake ($r) : Make {

        if (!isset($r ["id"])) throw new Error ("Invalid make.");

        $m = new Make ();
        $m->setId ($r["id"]);
        $m->setName ($r["name"]);
        return $m;        
    }

    public function getAllMakes () : array {
        $db = PdoFactory::getPdoObject();
        $makes = array();

        foreach ($db->query("select * from make") as $r) {
            $makes [] = self::mapDbRowToMake($r);
        }

        return $makes;
    }

    public function getMakeById (int $id) : Make {
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("select * from car_dealer.make where id = :id");
        $sql->execute (array (":id" => $id));
        $r = $sql->fetch (PDO::FETCH_ASSOC);        

        return self::mapDbRowToMake($r);        
    }

    public function addMake (Make $make) {            
        $db = PdoFactory::getPdoObject();

        $name = $make->getName();

        $sql = $db->prepare("call car_dealer.make_add (:name)");
        $sql->execute (array (":name" => $name));
        $r = $sql->fetch (PDO::FETCH_ASSOC);
        $make->setId ($r["id"]);
    }

    public function updateMake (Make $make) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.make_update (:id, :name)");
        $sql->execute (array (":id" => $make->getId (), ":name" => $make->getName()));
    }
}
?>