<?php

namespace Core\Models;

class Car {
    private $vin;
    private $transSerialNumber;
    private $modelId;
    private $year;
    private $engineSerialNumber;
    private $engineId;
    private $driveTrainId;

    public function getCarVin () : string { return $this->vin; }
    public function getTransSerialNumber () { return $this->transSerialNumber; }
    public function getModelId () { return $this->modelId; }
    public function getYear () { return $this->year; }
    public function getEngineSerialNumber () { return $this->engineSerialNumber; }
    public function getEngineId () { return $this->engineId; }
    public function getDriveTrainId () { return $this->driveTrainId; }
    
    public function setCarVin ($vin) { $this->vin = $vin; }
    public function setTransSerialNumber ($transSerialNumber) { $this->transSerialNumber = $transSerialNumber; }
    public function setModelId ($modelId) { $this->modelId = $modelId; }
    public function setYear ($year) { $this->year = $year; }
    public function setEngineSerialNumber ($engineSerialNumber) { $this->engineSerialNumber = $engineSerialNumber; }
    public function setEngineId ($engineId) { $this->engineId = $engineId; }
    public function setDriveTrainId ($driveTrainId) { $this->driveTrainId = $driveTrainId; }
}

?>