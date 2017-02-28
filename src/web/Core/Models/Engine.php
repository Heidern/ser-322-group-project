<?php

namespace Core\Models;

class Engine {
    private $engineCode;
    private $horsePower;
    private $torque;
    private $enginePlant;
    private $numCylinders;
    private $blockType;
    private $blockMaterial;
    private $displacement;
    private $fuelType;

    public function getEngineCode () : string { return $this->engineCode; }
    public function getHorsePower () { return $this->horsePower; }
    public function getTorque () { return $this->torque; }
    public function getEnginePlant () { return $this->enginePlant; }
    public function getNumCylinders () : int { return $this->numCylinders; }
    public function getBlockType () { return $this->blockType; }
    public function getBlockMaterial () { return $this->blockMaterial; }
    public function getDisplacement () { return $this->displacement; }
    public function getFuelType () { return $this->fuelType; }
    
    public function setEngineCode ($engineCode) { $this->engineCode = $engineCode; }
    public function setHorsePower ($horsePower) { $this->horsePower = $horsePower; }
    public function setTorque ($torque) { $this->torque = $torque; }
    public function setEnginePlant ($enginePlant) { $this->enginePlant = $enginePlant; }
    public function setNumCylinders ($numCylinders) { $this->numCylinders = $numCylinders; }
    public function setBlockType ($blockType) { $this->blockType = $blockType; }
    public function setBlockMaterial ($blockMaterial) { $this->blockMaterial = $blockMaterial; }
    public function setDisplacement ($displacement) { $this->displacement = $displacement; }
    public function setFuelType ($fuelType) { $this->fuelType = $fuelType; }
}

?>