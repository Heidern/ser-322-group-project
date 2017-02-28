<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\Projections\CarListItem;
use Core\Shared\PdoFactory;

interface ICarProjectionMapper {
    public function getAllCars () : array;
}

class CarProjectionMapper implements ICarProjectionMapper {

    private static function mapDbRowToCar ($r) : CarListItem {
        $c = new CarListItem ();
        $c->vin = $r["vin"];
        $c->transSerialNumber = $r["trans_serial_number"];
        $c->make = $r["make_name"];
        $c->model = $r["model_name"];
        $c->year = $r["year"];
        $c->engineSerialNumber = $r["engine_serial_number"];
        $c->engineId = $r["engine_id"];
        $c->driveTrainId = $r["drive_train_id"];
        return $c;        
    }

    public function getAllCars () : array {
        $db = PdoFactory::getPdoObject();
        $cars = array();

        foreach (
            $db->query("
                select make.name as make_name, model.name as model_name, car.* from car
                inner join model on model.id = car.model_id
                inner join make on make.id = model.make_id
                order by make.name, model.name, car.vin
            ") as $r) {
            $cars [] = self::mapDbRowToCar($r);
        }

        return $cars;
    }
}
?>