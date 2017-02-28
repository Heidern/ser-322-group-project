<?php

namespace ViewModels;

use Core\Services\Models\Engine as EngineDto;

class EngineEditViewModel {
    public $originalEngineCode;
    public $engineCode;
    public $horsePower;
    public $torque;
    public $enginePlant;
    public $numCylinders;
    public $blockType;
    public $blockMaterial;
    public $displacement;
    public $fuelType;

    public function loadFromDto (EngineDto $engineDto) {
        $this->engineCode = $engineDto->engineCode;
        $this->horsePower = $engineDto->horsePower;
        $this->torque = $engineDto->torque;
        $this->enginePlant = $engineDto->enginePlant;
        $this->numCylinders = $engineDto->numCylinders;
        $this->blockType = $engineDto->blockType;
        $this->blockMaterial = $engineDto->blockMaterial;
        $this->displacement = $engineDto->displacement;
        $this->fuelType = $engineDto->fuelType;
    }

    public function saveToDto (EngineDto $engineDto) {
        $engineDto->engineCode = $this->engineCode;
        $engineDto->horsePower = $this->horsePower;
        $engineDto->torque = $this->torque;
        $engineDto->enginePlant = $this->enginePlant;
        $engineDto->numCylinders = $this->numCylinders;
        $engineDto->blockType = $this->blockType;
        $engineDto->blockMaterial = $this->blockMaterial;
        $engineDto->displacement = $this->displacement;
        $engineDto->fuelType = $this->fuelType;
    }

    public function loadFromFormData () {
        $this->originalEngineCode = filter_input (INPUT_POST, "original_engine_code");        
        $this->engineCode = filter_input (INPUT_POST, "engine_code");
        $this->horsePower = filter_input (INPUT_POST, "horse_power");
        $this->torque = filter_input (INPUT_POST, "torque");
        $this->enginePlant = filter_input (INPUT_POST, "engine_plant");
        $this->numCylinders = filter_input (INPUT_POST, "num_cylinders");
        $this->blockType = filter_input (INPUT_POST, "block_type");
        $this->blockMaterial = filter_input (INPUT_POST, "block_material");
        $this->displacement = filter_input (INPUT_POST, "displacement");
        $this->fuelType = filter_input (INPUT_POST, "fuel_type");
    }
}
?>