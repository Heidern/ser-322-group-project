<?php

namespace ViewModels;

use Core\Services\Models\Make as MakeDto;

class MakeEditViewModel {
    public $id;
    public $name;

    public function loadFromDto (MakeDto $makeDto) {
        $this->id = $makeDto->id;
        $this->name = $makeDto->name;
    }

    public function saveToDto (MakeDto $makeDto) {
        $makeDto->id = $this->id;
        $makeDto->name = $this->name;
    }

    public function loadFromFormData () {
        $makeId = filter_input (INPUT_POST, "make-id", FILTER_VALIDATE_INT);
        if ($makeId === false) throw new Error ("Invalid make.");

        $this->id = $makeId;
        $this->name = filter_input (INPUT_POST, "name");
    }
}
?>