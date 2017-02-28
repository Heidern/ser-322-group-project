<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\DriveTrain;
use Core\Shared\PdoFactory;

interface IDriveTrainMapper {
    public function getAllDriveTrains () : array;
    public function getDriveTrainByCode (string $code) : DriveTrain;
    public function addDriveTrain (DriveTrain $driveTrain);
    public function updateDriveTrain (DriveTrain $driveTrain);    
}

class DriveTrainMapper implements IDriveTrainMapper {

    private static function mapDbRowToDriveTrain ($r) : DriveTrain {
        $e = new DriveTrain ();
        $e->setDriveTrainCode ($r["trans_code"]);
        $e->setTransType ($r["trans_type"]);
        $e->setTorqueRating ($r["torque_rating"]);
        $e->setNumGears ($r["num_gears"]);
        $e->setManufacturers ($r["manufacturers"]);
        return $e;        
    }

    public function getAllDriveTrains () : array {
        $db = PdoFactory::getPdoObject();
        $driveTrains = array();

        foreach ($db->query("select * from drive_train") as $r) {
            $driveTrains [] = self::mapDbRowToDriveTrain($r);
        }

        return $driveTrains;
    }

    public function getDriveTrainByCode (string $code) : DriveTrain {
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("select * from car_dealer.drive_train where trans_code = :code");
        $sql->execute (array (":code" => $code));
        $r = $sql->fetch (PDO::FETCH_ASSOC);

        return self::mapDbRowToDriveTrain($r);        
    }

    public function addDriveTrain (DriveTrain $driveTrain) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.drive_train_add (:trans_code, :trans_type, :torque_rating, :num_gears, :manufacturers)");
        $sql->execute (
            array (
                ":trans_code" => $driveTrain->getDriveTrainCode(),
                ":trans_type" => $driveTrain->getTransType(),
                ":torque_rating" => $driveTrain->getTorqueRating(),
                ":num_gears" => $driveTrain->getNumGears(),
                ":manufacturers" => $driveTrain->getManufacturers()
            )
        );
    }

    public function updateDriveTrain (DriveTrain $driveTrain) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.drive_train_update (:trans_code, :trans_type, :torque_rating, :num_gears, :manufacturers)");
        $sql->execute (
            array (
                ":trans_code" => $driveTrain->getDriveTrainCode(),
                ":trans_type" => $driveTrain->getTransType(),
                ":torque_rating" => $driveTrain->getTorqueRating(),
                ":num_gears" => $driveTrain->getNumGears(),
                ":manufacturers" => $driveTrain->getManufacturers()
            )
        );
    }
}
?>