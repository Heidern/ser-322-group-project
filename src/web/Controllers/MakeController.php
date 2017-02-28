<?php 
namespace Controllers;

use Core\Services\Models\Make as MakeDto;
use Core\Services\MakeService;

use ViewModels\MakeEditViewModel;

class MakeController {

    private $_makeService;
    
    public function __construct () {
        $this->_makeService = new MakeService ();
    }

    public function getAllMakes () {
        $makeDtos = $this->_makeService->getAllMakes ();

        $makeViewModels = array ();

        foreach ($makeDtos as $makeDto) {
            $vm = new MakeEditViewModel ();
            $vm->loadFromDto ($makeDto);
            $makeViewModels [] = $vm;
        }

        view ("makes", $makeViewModels);
    }

    public function getMake ($makeId) {

        $viewModel = new MakeEditViewModel ();

        if (isset ($makeId)) {            

            $make = $this->_makeService->getMakeById ($makeId);

            $viewModel->loadFromDto ($make);
        }

        view ("make-edit", $viewModel);
    }

    public function saveMake (MakeEditViewModel $viewModel) {
        if (isset ($viewModel->id)) {
            $makeDto = new MakeDto ();

            $viewModel->saveToDto ($makeDto);

            $this->_makeService->updateMake ($makeDto);        
        }
        else {
            $makeDto = new MakeDto ();

            $viewModel->saveToDto ($makeDto);

            $this->_makeService->addMake ($makeDto);

            $viewModel->id = $makeDto->id;
        }

        viewWithMessages ("make-edit", $viewModel, array ("Make saved successfully."));
    }
}
?>