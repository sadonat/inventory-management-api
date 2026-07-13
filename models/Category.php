<?php
require_once 'helpers/Databaser.php';
class Category{
    public static function create($name){
        $stmt = Databaser::runQuery('INSERT INTO category(name) VALUES(?)', [$name]);
        return $stmt->rowCount();
    }
}
