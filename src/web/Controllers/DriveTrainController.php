<?php 
namespace Controllers;

use Core\Services\Models\DriveTrain as DriveTrainDto;
use Core\Services\DriveTrainService;

use ViewModels\DriveTrainEditViewModel;

class DriveTrainController {

    private $_driveTrainService;
    
    public function __construct () {
        $this->_driveTrainService = new DriveTrainService ();
    }

    public function getAllDriveTrains () {
        $driveTrainDtos = $this->_driveTrainService->getAllDriveTrains ();

        $driveTrainViewModels = array ();

        foreach ($driveTrainDtos as $driveTrainDto) {
            $vm = new DriveTrainEditViewModel ();
            $vm->loadFromDto ($driveTrainDto);
            $driveTrainViewModels [] = $vm;
        }

        view ("drive-trains", $driveTrainViewModels);
    }

    public function getDriveTrainByCode ($driveTrainCode) {

        $viewModel = new DriveTrainEditViewModel ();

        if (isset ($driveTrainCode)) {            

            $driveTrain = $this->_driveTrainService->getDriveTrainByCode ($driveTrainCode);

            $viewModel->loadFromDto ($driveTrain);
        }

        view ("drive-train-edit", $viewModel);
    }

    public function saveDriveTrain (DriveTrainEditViewModel $viewModel) {
        if (isset ($viewModel->originalDriveTrainCode)) {
            $driveTrainDto = new DriveTrainDto ();

            $viewModel->saveToDto ($driveTrainDto);

            $this->_driveTrainService->updateDriveTrain ($driveTrainDto);        
        }
        else {
            $driveTrainDto = new DriveTrainDto ();

            $viewModel->saveToDto ($driveTrainDto);

            $this->_driveTrainService->addDriveTrain ($driveTrainDto);
        }

        viewWithMessages ("drive-train-edit", $viewModel, array ("Drive train saved successfully."));
    }
}
?>