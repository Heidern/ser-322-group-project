<?php

namespace ViewModels;

use Core\Services\Models\Car as CarDto;

class CarEditViewModel {
    public $originalCarVin;
    public $vin;
    public $transSerialNumber;
    public $modelId;
    public $year;
    public $engineSerialNumber;
    public $engineId;
    public $driveTrainId;
    public $displacement;
    public $fuelType;

    public function loadFromDto (CarDto $carDto) {
        $this->vin = $carDto->vin;
        $this->transSerialNumber = $carDto->transSerialNumber;
        $this->modelId = $carDto->modelId;
        $this->year = $carDto->year;
        $this->engineSerialNumber = $carDto->engineSerialNumber;
        $this->engineId = $carDto->engineId;
        $this->driveTrainId = $carDto->driveTrainId;
    }

    public function saveToDto (CarDto $carDto) {
        $carDto->vin = $this->vin;
        $carDto->transSerialNumber = $this->transSerialNumber;
        $carDto->modelId = $this->modelId;
        $carDto->year = $this->year;
        $carDto->engineSerialNumber = $this->engineSerialNumber;
        $carDto->engineId = $this->engineId;
        $carDto->driveTrainId = $this->driveTrainId;
    }

    public function loadFromFormData () {
        $this->originalCarVin = filter_input (INPUT_POST, "original_vin");        
        $this->vin = filter_input (INPUT_POST, "vin");
        $this->transSerialNumber = filter_input (INPUT_POST, "trans_serial_number");
        $this->modelId = filter_input (INPUT_POST, "model_id");
        $this->year = filter_input (INPUT_POST, "year");
        $this->engineSerialNumber = filter_input (INPUT_POST, "engine_serial_number");
        $this->engineId = filter_input (INPUT_POST, "engine_id");
        $this->driveTrainId = filter_input (INPUT_POST, "drive_train_id");
    }
}
?>