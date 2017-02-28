<?php
namespace Core\Models;

class DriveTrain {
    private $driveTrainCode;
    private $transType;
    private $torqueRating;
    private $numGears;
    private $manufacturers;

    public function getDriveTrainCode () : string { return $this->driveTrainCode; }
    public function getTransType () { return $this->transType; }
    public function getTorqueRating () { return $this->torqueRating; }
    public function getNumGears () { return $this->numGears; }
    public function getManufacturers () { return $this->manufacturers; }
    
    public function setDriveTrainCode ($driveTrainCode) { $this->driveTrainCode = $driveTrainCode; }
    public function setTransType ($transType) { $this->transType = $transType; }
    public function setTorqueRating ($torqueRating) { $this->torqueRating = $torqueRating; }
    public function setNumGears ($numGears) { $this->numGears = $numGears; }
    public function setManufacturers ($manufacturers) { $this->manufacturers = $manufacturers; }
}
?>