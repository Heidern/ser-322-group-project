<?php

namespace Core\Models;

class Model {
    private $id;
    private $makeId;
    private $name;

    public function getId () : int { return $this->id; }
    public function getMakeId () : int { return $this->makeId; }
    public function getName () : string { return $this->name; } 

    public function setId (int $id) { $this->id = $id; }
    public function setMakeId (int $makeId) { $this->makeId = $makeId; }
    public function setName (string $name) { $this->name = $name; }
}

?>