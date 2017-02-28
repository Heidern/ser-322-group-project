<?php

namespace ViewModels;

use Core\Services\Models\Model as ModelDto;

class ModelEditViewModel {
	public $id;
	public $makeId;
	public $makes;
	public $name;

	public function loadFromDto (ModelDto $modelDto) {
		$this->id = $modelDto->id;
		$this->makeId = $modelDto->makeId;
		$this->name = $modelDto->name;
	}

	public function saveToDto (ModelDto $modelDto) {
		$modelDto->id = $this->id;
		$modelDto->makeId = $this->makeId;
		$modelDto->name = $this->name;
	}

	public function loadFromFormData () {
		$modelId = filter_input (INPUT_POST, "model-id", FILTER_VALIDATE_INT);
		if ($modelId === false) throw new Error ("Invalid model.");

		$makeId = filter_input (INPUT_POST, "make-id", FILTER_VALIDATE_INT);
		if ($makeId === false) throw new Error ("Invalid make.");

		$this->id = $modelId;
		$this->makeId = $makeId;
		$this->name = filter_input (INPUT_POST, "name");
	}
}
?>