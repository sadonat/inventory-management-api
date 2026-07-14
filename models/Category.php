<?php
require_once 'helpers/Databaser.php';
class Category{
    public static function create($name){
        $stmt = Databaser::runQuery('INSERT INTO category(name) VALUES(?)', [$name]);
        return $stmt->rowCount();
    }

public static function getAll($limit, $offset)
    {
        $stmt = Databaser::runQuery('SELECT * FROM category LIMIT ? OFFSET ?', [$limit, $offset]);

        return $stmt->fetchAll();
    }

    public static function getById($id)
    {
        $stmt = Databaser::runQuery('SELECT * FROM category WHERE id = ?', [$id]);

        return $stmt->fetch();
    }
}
