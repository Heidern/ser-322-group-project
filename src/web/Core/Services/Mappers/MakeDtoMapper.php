<?php
namespace Core\Services\Mappers;

use Core\Services\Models\Make as MakeDto;
use Core\Models\Make;

class MakeDtoMapper {

    private $_makeMapper = null;

    public function __construct () {
    }

    public function mapEntityToDto (Make $make) : MakeDto {
        $dto = new MakeDto ();
        $dto->id = $make->getId ();
        $dto->name = $make->getName ();
        return $dto;
    }

    public function mapEntitiesToDtos (array $makes) : array {
        $makeDtos = array ();

        foreach ($makes as $m) {
            $makeDtos [] = $this->mapEntityToDto ($m);
        }

        return $makeDtos;
    }

    public function mapDtoToEntity (MakeDto $makeDto) : Make {
        $make = new Make ();
        if (isset ($makeDto->id)) $make->setId ($makeDto->id);
        $make->setName ($makeDto->name);
        return $make;
    }
}
