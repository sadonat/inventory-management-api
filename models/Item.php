<?php

require_once 'helpers/Databaser.php';

class Item{
    public static function create($sku, $name, $category_id, $description){
        $stmt = Databaser::runQuery('INSERT INTO item(sku, name, category_id, description, quantity) VALUES(?, ?, ?, ?, 0)', [$sku, $name, $category_id, $description]);
        return $stmt->rowCount();
    }
}
