<?php
namespace Core\Shared;
use \PDO;
class PdoFactory {
    public static function getPdoObject () {
        return new PDO('mysql:host=localhost;dbname=car_dealer;charset=utf8mb4', 'root', '');
    }
}
?>
