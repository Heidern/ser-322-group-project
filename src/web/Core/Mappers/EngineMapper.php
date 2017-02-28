<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\Engine;
use Core\Shared\PdoFactory;

interface IEngineMapper {
    public function getAllEngines () : array;
    public function getEngineByCode (string $code) : Engine;
    public function addEngine (Engine $engine);
    public function updateEngine (Engine $engine);    
}

class EngineMapper implements IEngineMapper {

    private static function mapDbRowToEngine ($r) : Engine {
        $e = new Engine ();
        $e->setEngineCode ($r["engine_code"]);
        $e->setHorsePower ($r["horse_power"]);
        $e->setTorque ($r["torque"]);
        $e->setEnginePlant ($r["engine_plant"]);
        $e->setNumCylinders ($r["num_cylinders"]);
        $e->setBlockType ($r["block_type"]);
        $e->setBlockMaterial ($r["block_material"]);
        $e->setDisplacement ($r["displacement"]);
        $e->setFuelType ($r["fuel_type"]);
        return $e;        
    }

    public function getAllEngines () : array {
        $db = PdoFactory::getPdoObject();
        $engines = array();

        foreach ($db->query("select * from engine") as $r) {
            $engines [] = self::mapDbRowToEngine($r);
        }

        return $engines;
    }

    public function getEngineByCode (string $code) : Engine {
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("select * from car_dealer.engine where engine_code = :code");
        $sql->execute (array (":code" => $code));
        $r = $sql->fetch (PDO::FETCH_ASSOC);

        return self::mapDbRowToEngine($r);        
    }

    public function addEngine (Engine $engine) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.engine_add (:engine_code, :horse_power, :torque, :engine_plant, :num_cylinders, :block_type, :block_material, :displacement, :fuel_type)");
        $sql->execute (
            array (
                ":engine_code" => $engine->getEngineCode(),
                ":horse_power" => $engine->getHorsePower(),
                ":torque" => $engine->getTorque(),
                ":engine_plant" => $engine->getEnginePlant(),
                ":num_cylinders" => $engine->getNumCylinders(),
                ":block_type" => $engine->getBlockType(),
                ":block_material" => $engine->getBlockMaterial(),
                ":displacement" => $engine->getDisplacement(),
                ":fuel_type" => $engine->getFuelType()
            )
        );
    }

    public function updateEngine (Engine $engine) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.engine_update (:engine_code, :horse_power, :torque, :engine_plant, :num_cylinders, :block_type, :block_material, :displacement, :fuel_type)");
        $sql->execute (
            array (
                ":engine_code" => $engine->getEngineCode(),
                ":horse_power" => $engine->getHorsePower(),
                ":torque" => $engine->getTorque(),
                ":engine_plant" => $engine->getEnginePlant(),
                ":num_cylinders" => $engine->getNumCylinders(),
                ":block_type" => $engine->getBlockType(),
                ":block_material" => $engine->getBlockMaterial(),
                ":displacement" => $engine->getDisplacement(),
                ":fuel_type" => $engine->getFuelType()
            )
        );
    }
}
?>