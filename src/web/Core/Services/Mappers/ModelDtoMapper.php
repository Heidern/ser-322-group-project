<?php
namespace Core\Services\Mappers;

use Core\Services\Models\Model as ModelDto;
use Core\Models\Model;

class ModelDtoMapper {

    private $_modelMapper = null;

    public function mapEntityToDto (Model $model) : ModelDto {
        $dto = new ModelDto ();
        $dto->id = $model->getId ();
        $dto->makeId = $model->getMakeId();
        $dto->name = $model->getName ();
        return $dto;
    }

    public function mapEntitiesToDtos (array $models) : array {
        $modelDtos = array ();

        foreach ($models as $m) {
            $modelDtos [] = $this->mapEntityToDto ($m);
        }

        return $modelDtos;
    }

    public function mapDtoToEntity (ModelDto $modelDto) : Model {
        $model = new Model ();
        if (isset ($modelDto->id)) $model->setId ($modelDto->id);
        $model->setMakeId ($modelDto->makeId);
        $model->setName ($modelDto->name);
        return $model;
    }
}