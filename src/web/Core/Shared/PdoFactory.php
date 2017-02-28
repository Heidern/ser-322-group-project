<?php

namespace Core\Shared;

use \PDO;

class PdoFactory {
    public static function getPdoObject () {
        return new PDO('mysql:host=192.168.1.200:32768;dbname=car_dealer;charset=utf8mb4', 'admin', 'password');
    }
}

?>