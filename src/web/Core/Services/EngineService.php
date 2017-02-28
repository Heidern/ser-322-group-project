<?php
namespace Core\Services;

use \Error;

use Core\Services\Models\Engine as EngineDto;
use Core\Services\Mappers\EngineDtoMapper as EngineDtoMapper;
use Core\Entities\Engine;
use Core\Mappers\EngineMapper;

interface IEngineService {
    public function getAllEngines () : array;
    public function getEngineByCode ($code) : EngineDto;
    public function addEngine (EngineDto $engine);
    public function updateEngine (EngineDto $engine);
}

class EngineService implements IEngineService {

    private $_engineMapper = null;
    private $_dtoMapper = null;

    public function __construct () {
        $this->_engineMapper = new EngineMapper ();
        $this->_dtoMapper = new EngineDtoMapper ();
    }

    public function getAllEngines () : array {
        $engines = $this->_engineMapper->getAllEngines ();
        return $this->_dtoMapper->mapEntitiesToDtos ($engines);
    }

    public function getEngineByCode ($engineCode) : EngineDto {
        $engine = $this->_engineMapper->getEngineByCode ($engineCode);
        return $this->_dtoMapper->mapEntityToDto ($engine);        
    }

    public function addEngine (EngineDto $engineDto) {
        $engine = $this->_dtoMapper->mapDtoToEntity ($engineDto);
        $this->_engineMapper->addEngine ($engine);
    }

    public function updateEngine (EngineDto $engineDto) {
        $engine = $this->_dtoMapper->mapDtoToEntity ($engineDto);
        $this->_engineMapper->updateEngine ($engine);
    }
}
?>