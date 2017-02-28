<?php

namespace Core\Mappers;

use \PDO;
use \Error;
use Core\Models\Projections\ModelListItem;
use Core\Shared\PdoFactory;

interface IModelProjectionMapper {
    public function getAllModels () : array;
}

class ModelProjectionMapper implements IModelProjectionMapper {

    private static function mapDbRowToModel ($r) : ModelListItem {
        $m = new ModelListItem ();
        $m->id = $r["id"];
        $m->makeId = $r["make_id"];
        $m->makeName = $r["make_name"];
        $m->name = $r["name"];
        return $m;        
    }

    public function getAllModels () : array {
        $db = PdoFactory::getPdoObject();
        $models = array();

        foreach ($db->query("select make.name as make_name, model.* from model left join make on model.make_id = make.id order by make.name") as $r) {
            $models [] = self::mapDbRowToModel($r);
        }

        return $models;
    }
}
?>