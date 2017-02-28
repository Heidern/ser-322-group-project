<?php 
namespace Controllers;

use Core\Services\Models\Model as ModelDto;
use Core\Services\ModelService;
use Core\Services\MakeService;

use ViewModels\ModelViewModel;
use ViewModels\ModelEditViewModel;

class ModelController {
	
	private $_modelService;
	private $_makeService;
	
	public function __construct () {
		$this->_modelService = new ModelService ();
		$this->_makeService = new MakeService ();
	}

	public function getAllModels () {
		$modelProjections = $this->_modelService->getAllModels ();

		view ("models", $modelProjections);
	}

	public function getModel ($modelId) {

        $viewModel = new ModelEditViewModel ();

		if (isset ($modelId)) {
			$model = $this->_modelService->getModelById ($modelId);

			$viewModel->loadFromDto ($model);
		}

		$makes = $this->_makeService->getAllMakes ();
		$viewModel->makes = $makes;

        view ("model-edit", $viewModel);
	}

	public function saveModel (ModelEditViewModel $viewModel) {
		if (isset ($viewModel->id)) {
            $modelDto = new ModelDto ();

            $viewModel->saveToDto ($modelDto);

            $this->_modelService->updateModel ($modelDto);		
		}
		else {
            $modelDto = new ModelDto ();
            $viewModel->saveToDto ($modelDto);

            $this->_modelService->addModel ($modelDto);
            $viewModel->id = $modelDto->id;
		}

		$makes = $this->_makeService->getAllMakes ();
		$viewModel->makes = $makes;

        viewWithMessages ("model-edit", $viewModel, array ("Mode saved successfully."));
	}
}
?>