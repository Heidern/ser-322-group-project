<?php 
namespace Controllers;

use Core\Services\Models\Engine as EngineDto;
use Core\Services\EngineService;

use ViewModels\EngineEditViewModel;

class EngineController {

    private $_engineService;
    
    public function __construct () {
        $this->_engineService = new EngineService ();
    }

    public function getAllEngines () {
        $engineDtos = $this->_engineService->getAllEngines ();

        $engineViewModels = array ();

        foreach ($engineDtos as $engineDto) {
            $vm = new EngineEditViewModel ();
            $vm->loadFromDto ($engineDto);
            $engineViewModels [] = $vm;
        }

        view ("engines", $engineViewModels);
    }

    public function getEngineByCode ($engineCode) {

        $viewModel = new EngineEditViewModel ();

        if (isset ($engineCode)) {            

            $engine = $this->_engineService->getEngineByCode ($engineCode);

            $viewModel->loadFromDto ($engine);
        }

        view ("engine-edit", $viewModel);
    }

    public function saveEngine (EngineEditViewModel $viewModel) {
        if (isset ($viewModel->originalEngineCode)) {
            $engineDto = new EngineDto ();

            $viewModel->saveToDto ($engineDto);

            $this->_engineService->updateEngine ($engineDto);        
        }
        else {
            $engineDto = new EngineDto ();

            $viewModel->saveToDto ($engineDto);

            $this->_engineService->addEngine ($engineDto);
        }

        viewWithMessages ("engine-edit", $viewModel, array ("Engine saved successfully."));
    }
}
?>