<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Entities\Make;
use Core\Shared\DbConnectionFactory;

interface IMakeMapper {
    public function getAllMakes () : array;
    public function addMake (Make $make);
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
        $db = DbConnectionFactory::getConnection ();
        $makes = array();

        foreach ($db->query("select * from makes") as $r) {
            $makes [] = self::mapDbRowToMake($r);
        }

        return $makes;
    }

    public function getMakeById (int $id) : Make {
        $db = DbConnectionFactory::getConnection ();

        $sql = $db->prepare("select * from car_dealer.makes where id = :id");
        $sql->execute (array (":id" => $id));
        $r = $sql->fetch (PDO::FETCH_ASSOC);        

        return self::mapDbRowToMake($r);        
    }

    public function addMake (Make $make) {            
        $db = DbConnectionFactory::getConnection ();

        $name = $make->getName();

        $sql = $db->prepare("call car_dealer.make_add (:name)");
        $sql->execute (array (":name" => $name));
        $r = $sql->fetch (PDO::FETCH_ASSOC);
        $make->setId ($r['id']);
    }

    public function updateMake (Make $make) {            
        $db = DbConnectionFactory::getConnection ();

        $sql = $db->prepare("call car_dealer.make_update (:id, :name)");
        $sql->execute (array (":id" => $make->getId (), ":name" => $make->getName()));
    }
}
?>