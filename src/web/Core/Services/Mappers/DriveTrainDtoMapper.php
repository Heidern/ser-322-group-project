<?php
namespace Core\Services\Mappers;

use Core\Services\Models\DriveTrain as DriveTrainDto;
use Core\Models\DriveTrain;

class DriveTrainDtoMapper {

    private $_engineMapper = null;

    public function mapEntityToDto (DriveTrain $driveTrain) : DriveTrainDto {
        $dto = new DriveTrainDto ();
        $dto->driveTrainCode = $driveTrain->getDriveTrainCode();
        $dto->transType = $driveTrain->getTransType();
        $dto->torqueRating = $driveTrain->getTorqueRating();
        $dto->numGears = $driveTrain->getNumGears();
        $dto->manufacturers = $driveTrain->getManufacturers();
        return $dto;
    }

    public function mapEntitiesToDtos (array $driveTrains) : array {
        $driveTrainDtos = array ();

        foreach ($driveTrains as $m) {
            $driveTrainDtos [] = $this->mapEntityToDto ($m);
        }

        return $driveTrainDtos;
    }

    public function mapDtoToEntity (DriveTrainDto $driveTrainDto) : DriveTrain {
        $e = new DriveTrain ();
        $e->setDriveTrainCode ($driveTrainDto->driveTrainCode);
        $e->setTransType ($driveTrainDto->transType);
        $e->setTorqueRating ($driveTrainDto->torqueRating);
        $e->setNumGears ($driveTrainDto->numGears);
        $e->setManufacturers ($driveTrainDto->manufacturers);
        return $e;
    }
}
?>