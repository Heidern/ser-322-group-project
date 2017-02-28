<?php
namespace Core\Services;

use \Error;

use Core\Services\Models\DriveTrain as DriveTrainDto;
use Core\Services\Mappers\DriveTrainDtoMapper as DriveTrainDtoMapper;
use Core\Entities\DriveTrain;
use Core\Mappers\DriveTrainMapper;

interface IDriveTrainService {
    public function getAllDriveTrains () : array;
    public function getDriveTrainByCode ($code) : DriveTrainDto;
    public function addDriveTrain (DriveTrainDto $driveTrain);
    public function updateDriveTrain (DriveTrainDto $driveTrain);
}

class DriveTrainService implements IDriveTrainService {

    private $_driveTrainMapper = null;
    private $_dtoMapper = null;

    public function __construct () {
        $this->_engineMapper = new DriveTrainMapper ();
        $this->_dtoMapper = new DriveTrainDtoMapper ();
    }

    public function getAllDriveTrains () : array {
        $driveTrains = $this->_engineMapper->getAllDriveTrains ();
        return $this->_dtoMapper->mapEntitiesToDtos ($driveTrains);
    }

    public function getDriveTrainByCode ($driveTrainCode) : DriveTrainDto {
        $driveTrain = $this->_engineMapper->getDriveTrainByCode ($driveTrainCode);
        return $this->_dtoMapper->mapEntityToDto ($driveTrain);        
    }

    public function addDriveTrain (DriveTrainDto $driveTrainDto) {
        $driveTrain = $this->_dtoMapper->mapDtoToEntity ($driveTrainDto);
        $this->_engineMapper->addDriveTrain ($driveTrain);
    }

    public function updateDriveTrain (DriveTrainDto $driveTrainDto) {
        $driveTrain = $this->_dtoMapper->mapDtoToEntity ($driveTrainDto);
        $this->_engineMapper->updateDriveTrain ($driveTrain);
    }
}
?>