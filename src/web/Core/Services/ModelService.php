<?php
namespace Core\Services;

use \Error;

use Core\Services\Models\Model as ModelDto;
use Core\Services\Mappers\ModelDtoMapper as ModelDtoMapper;
use Core\Entities\Model;
use Core\Mappers\ModelMapper;
use Core\Mappers\ModelProjectionMapper;

interface IModelService {
    public function getAllModels () : array;
    public function getModelById (int $id) : ModelDto;
    public function addModel (ModelDto $model);
    public function updateModel (ModelDto $model);
}

class ModelService implements IModelService {

    private $_modelMapper = null;
    private $_modelProjectionMapper = null;
    private $_dtoMapper = null;

    public function __construct () {
        $this->_modelMapper = new ModelMapper ();
        $this->_modelProjectionMapper = new ModelProjectionMapper ();
        $this->_dtoMapper = new ModelDtoMapper ();
    }

    public function getAllModels () : array {
        return $this->_modelProjectionMapper->getAllModels ();
    }

    public function getModelById (int $id) : ModelDto {
        $model = $this->_modelMapper->getModelById ($id);
        return $this->_dtoMapper->mapEntityToDto ($model);        
    }

    public function addModel (ModelDto $modelDto) {
        $model = $this->_dtoMapper->mapDtoToEntity ($modelDto);
        $this->_modelMapper->addModel ($model);
        $modelDto->id = $model->getId ();
    }

    public function updateModel (ModelDto $modelDto) {
        $model = $this->_dtoMapper->mapDtoToEntity ($modelDto);
        $this->_modelMapper->updateModel ($model);
    }
}
