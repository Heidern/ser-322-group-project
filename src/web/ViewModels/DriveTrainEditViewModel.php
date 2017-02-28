<?php

namespace ViewModels;

use Core\Services\Models\DriveTrain as DriveTrainDto;

class DriveTrainEditViewModel {
    public $originalDriveTrainCode;
    public $driveTrainCode;
    public $transType;
    public $torqueRating;
    public $numGears;
    public $manufacturers;

    public function loadFromDto (DriveTrainDto $driveTrainDto) {
        $this->driveTrainCode = $driveTrainDto->driveTrainCode;
        $this->transType = $driveTrainDto->transType;
        $this->torqueRating = $driveTrainDto->torqueRating;
        $this->numGears = $driveTrainDto->numGears;
        $this->manufacturers = $driveTrainDto->manufacturers;
    }

    public function saveToDto (DriveTrainDto $driveTrainDto) {
        $driveTrainDto->driveTrainCode = $this->driveTrainCode;
        $driveTrainDto->transType = $this->transType;
        $driveTrainDto->torqueRating = $this->torqueRating;
        $driveTrainDto->numGears = $this->numGears;
        $driveTrainDto->manufacturers = $this->manufacturers;
    }

    public function loadFromFormData () {
        $this->originalDriveTrainCode = filter_input (INPUT_POST, "original_drive_train_code");        
        $this->driveTrainCode = filter_input (INPUT_POST, "drive_train_code");
        $this->transType = filter_input (INPUT_POST, "trans_type");
        $this->torqueRating = filter_input (INPUT_POST, "torque_rating");
        $this->numGears = filter_input (INPUT_POST, "num_gears");
        $this->manufacturers = filter_input (INPUT_POST, "manufacturers");
    }
}
?>