<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\Model;
use Core\Shared\PdoFactory;

interface IModelMapper {
    public function getModelById (int $id) : Model;
    public function addModel (Model $model);
    public function updateModel (Model $model);    
}

class ModelMapper implements IModelMapper {

    private static function mapDbRowToModel ($r) : Model {

        if (!isset($r ["id"])) throw new Error ("Invalid model.");

        $m = new Model ();
        $m->setId ($r["id"]);
        $m->setMakeId ($r["make_id"]);
        $m->setName ($r["name"]);
        return $m;        
    }

    public function getModelById (int $id) : Model {
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("select * from car_dealer.model where id = :id");
        $sql->execute (array (":id" => $id));
        $r = $sql->fetch (PDO::FETCH_ASSOC);        

        return self::mapDbRowToModel($r);        
    }

    public function addModel (Model $model) {            
        $db = PdoFactory::getPdoObject();

        $name = $model->getName();

        $sql = $db->prepare("call car_dealer.model_add (:make_id, :name)");
        $sql->execute (array (":make_id" => $model->getMakeId(), ":name" => $model->getName ()));
        $r = $sql->fetch (PDO::FETCH_ASSOC);
        $model->setId ($r["id"]);
    }

    public function updateModel (Model $model) {            
        $db = PdoFactory::getPdoObject();

        $sql = $db->prepare("call car_dealer.model_update (:id, :make_id, :name)");
        $sql->execute (
            array (
                ":id" => $model->getId (),
                ":make_id" => $model->getMakeId(),
                ":name" => $model->getName()
            )
        );
    }
}
?>