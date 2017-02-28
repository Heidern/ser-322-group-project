<?php
namespace Core\Services;

use \Error;

use Core\Services\Models\Make as MakeDto;
use Core\Services\Mappers\MakeDtoMapper as MakeDtoMapper;
use Core\Entities\Make;
use Core\Mappers\MakeMapper;

interface IMakeService {
    public function getAllMakes () : array;
    public function getMakeById (int $id) : MakeDto;
    public function addMake (MakeDto $make);
    public function updateMake (MakeDto $make);
}

class MakeService implements IMakeService {

    private $_makeMapper = null;
    private $_dtoMapper = null;

    public function __construct () {
        $this->_makeMapper = new MakeMapper ();
        $this->_dtoMapper = new MakeDtoMapper ();
    }

    public function getAllMakes () : array {
        $makes = $this->_makeMapper->getAllMakes ();
        return $this->_dtoMapper->mapEntitiesToDtos ($makes);
    }

    public function getMakeById (int $id) : MakeDto {
        $make = $this->_makeMapper->getMakeById ($id);
        return $this->_dtoMapper->mapEntityToDto ($make);        
    }

    public function addMake (MakeDto $makeDto) {
        $make = $this->_dtoMapper->mapDtoToEntity ($makeDto);
        $this->_makeMapper->addMake ($make);
        $makeDto->id = $make->getId ();
    }

    public function updateMake (MakeDto $makeDto) {
        $make = $this->_dtoMapper->mapDtoToEntity ($makeDto);
        $this->_makeMapper->updateMake ($make);
    }
}
