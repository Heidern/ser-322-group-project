<?php 
namespace Controllers;

use Core\Services\Models\Car as CarDto;
use Core\Services\CarService;

use ViewModels\CarEditViewModel;

class CarController {

    private $_carService;
    
    public function __construct () {
        $this->_carService = new CarService ();
    }

    public function getAllCars () {
        $carProjections = $this->_carService->getAllCars ();

        view ("cars", $carProjections);
    }

    public function getCarByVin ($vin) {

        $viewModel = new CarEditViewModel ();

        if (isset ($vin)) {            

            $car = $this->_carService->getCarByVin ($vin);

            $viewModel->loadFromDto ($car);
        }

        view ("car-edit", $viewModel);
    }

    public function saveCar (CarEditViewModel $viewModel) {
        if (isset ($viewModel->originalCarVin)) {
            $carDto = new CarDto ();

            $viewModel->saveToDto ($carDto);

            $this->_carService->updateCar ($carDto);        
        }
        else {
            $carDto = new CarDto ();

            $viewModel->saveToDto ($carDto);

            $this->_carService->addCar ($carDto);
        }

        viewWithMessages ("car-edit", $viewModel, array ("Car saved successfully."));
    }
}
?>