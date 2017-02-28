<?php
namespace Core\Services\Mappers;

use Core\Services\Models\Car as CarDto;
use Core\Models\Car;

class CarDtoMapper {

    private $_carMapper = null;

    public function mapEntityToDto (Car $car) : CarDto {
        $dto = new CarDto ();
        $dto->vin = $car->getCarVin();
        $dto->transSerialNumber = $car->getTransSerialNumber();
        $dto->modelId = $car->getModelId();
        $dto->year = $car->getYear();
        $dto->engineSerialNumber = $car->getEngineSerialNumber();
        $dto->engineId = $car->getEngineId();
        $dto->driveTrainId = $car->getDriveTrainId();
        return $dto;
    }

    public function mapEntitiesToDtos (array $cars) : array {
        $carDtos = array ();

        foreach ($cars as $m) {
            $carDtos [] = $this->mapEntityToDto ($m);
        }

        return $carDtos;
    }

    public function mapDtoToEntity (CarDto $carDto) : Car {
        $e = new Car ();
        $e->setCarVin ($carDto->vin);
        $e->setTransSerialNumber ($carDto->transSerialNumber);
        $e->setModelId ($carDto->modelId);
        $e->setYear ($carDto->year);
        $e->setEngineSerialNumber ($carDto->engineSerialNumber);
        $e->setEngineId ($carDto->engineId);
        $e->setDriveTrainId ($carDto->driveTrainId);
        return $e;
    }
}
?>