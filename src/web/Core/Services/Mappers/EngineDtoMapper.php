<?php
namespace Core\Services\Mappers;

use Core\Services\Models\Engine as EngineDto;
use Core\Models\Engine;

class EngineDtoMapper {

    private $_engineMapper = null;

    public function mapEntityToDto (Engine $engine) : EngineDto {
        $dto = new EngineDto ();
        $dto->engineCode = $engine->getEngineCode();
        $dto->horsePower = $engine->getHorsePower();
        $dto->torque = $engine->getTorque();
        $dto->enginePlant = $engine->getEnginePlant();
        $dto->numCylinders = $engine->getNumCylinders();
        $dto->blockType = $engine->getBlockType();
        $dto->blockMaterial = $engine->getBlockMaterial();
        $dto->displacement = $engine->getDisplacement();
        $dto->fuelType = $engine->getFuelType();
        return $dto;
    }

    public function mapEntitiesToDtos (array $engines) : array {
        $engineDtos = array ();

        foreach ($engines as $m) {
            $engineDtos [] = $this->mapEntityToDto ($m);
        }

        return $engineDtos;
    }

    public function mapDtoToEntity (EngineDto $engineDto) : Engine {
        $e = new Engine ();
        $e->setEngineCode ($engineDto->engineCode);
        $e->setHorsePower ($engineDto->horsePower);
        $e->setTorque ($engineDto->torque);
        $e->setEnginePlant ($engineDto->enginePlant);
        $e->setNumCylinders ($engineDto->numCylinders);
        $e->setBlockType ($engineDto->blockType);
        $e->setBlockMaterial ($engineDto->blockMaterial);
        $e->setDisplacement ($engineDto->displacement);
        $e->setFuelType ($engineDto->fuelType);
        return $e;
    }
}
?>