<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\Car;
use Core\Shared\PdoFactory;

interface ICarMapper {
    public function getAllCars () : array;
    public function getCarByVin (string $vin) : Car;
    public function addCar (Car $car);
    public function updateCar (Car $car);    
}

class CarMapper implements ICarMapper {

    private static function mapDbRowToCar ($r) : Car {
        $e = new Car ();
        $e->setCarVin ($r["vin"]);
        $e->setTransSerialNumber ($r["trans_serial_number"]);
        $e->setModelId ($r["model_id"]);
        $e->setYear ($r["year"]);
        $e->setEngineSerialNumber ($r["engine_serial_number"]);
        $e->setEngineId ($r["engine_id"]);
        $e->setDriveTrainId ($r["drive_train_id"]);
        return $e;        
    }

    public function getAllCars () : array {
        $db = PdoFactory::getPdoObject();
        $cars = array();

        foreach ($db->query("select * from car") as $r) {
            $cars [] = self::mapDbRowToCar($r);
        }

        return $cars;
    }

    public function getCarByVin (string $vin) : Car {
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("select * from car_dealer.car where vin = :vin");
        $sql->execute (array (":vin" => $vin));
        $r = $sql->fetch (PDO::FETCH_ASSOC);

        return self::mapDbRowToCar($r);        
    }

    public function addCar (Car $car) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.car_add (:vin, :trans_serial_number, :model_id, :year, :engine_serial_number, :engine_id, :drive_train_id)");
        $sql->execute (
            array (
                ":vin" => $car->getCarVin(),
                ":trans_serial_number" => $car->getTransSerialNumber(),
                ":model_id" => $car->getModelId(),
                ":year" => $car->getYear(),
                ":engine_serial_number" => $car->getEngineSerialNumber(),
                ":engine_id" => $car->getEngineId(),
                ":drive_train_id" => $car->getDriveTrainId()
            )
        );
    }

    public function updateCar (Car $car) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.car_update (:vin, :trans_serial_number, :model_id, :year, :engine_serial_number, :engine_id, :drive_train_id)");
        $sql->execute (
            array (
                ":vin" => $car->getCarVin(),
                ":trans_serial_number" => $car->getTransSerialNumber(),
                ":model_id" => $car->getModelId(),
                ":year" => $car->getYear(),
                ":engine_serial_number" => $car->getEngineSerialNumber(),
                ":engine_id" => $car->getEngineId(),
                ":drive_train_id" => $car->getDriveTrainId()
            )
        );
    }
}
?>