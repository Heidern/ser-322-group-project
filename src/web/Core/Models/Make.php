<?php

namespace Core\Models;

class Make {
    private $id;
    private $name;

    public function getId () : int { return $this->id; }
    public function getName () : string { return $this->name; } 

    public function setId (int $id) { $this->id = $id; }
    public function setName (string $name) { $this->name = $name; }
}

?>