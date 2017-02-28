<?php
namespace Core\Services;

use \Error;

use Core\Services\Models\Car as CarDto;
use Core\Services\Mappers\CarDtoMapper as CarDtoMapper;
use Core\Entities\Car;
use Core\Mappers\CarMapper;
use Core\Mappers\CarProjectionMapper;

interface ICarService {
    public function getAllCars () : array;
    public function getCarByVin ($vin) : CarDto;
    public function addCar (CarDto $car);
    public function updateCar (CarDto $car);
}

class CarService implements ICarService {

    private $_carMapper = null;
    private $_carProjectionMapper = null;
    private $_dtoMapper = null;

    public function __construct () {
        $this->_carMapper = new CarMapper ();
        $this->_carProjectionMapper = new CarProjectionMapper ();
        $this->_dtoMapper = new CarDtoMapper ();
    }

    public function getAllCars () : array {
        return $this->_carProjectionMapper->getAllCars ();
    }

    public function getCarByVin ($vin) : CarDto {
        $car = $this->_carMapper->getCarByVin ($vin);
        return $this->_dtoMapper->mapEntityToDto ($car);        
    }

    public function addCar (CarDto $carDto) {
        $car = $this->_dtoMapper->mapDtoToEntity ($carDto);
        $this->_carMapper->addCar ($car);
    }

    public function updateCar (CarDto $carDto) {
        $car = $this->_dtoMapper->mapDtoToEntity ($carDto);
        $this->_carMapper->updateCar ($car);
    }
}
?>