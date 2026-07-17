<?php

require_once 'helpers/Databaser.php';
class Category
{
    public static function create($name)
    {
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

    public static function delete($id)
    {
        $stmt = Databaser::runQuery('DELETE FROM category WHERE id = ?', [$id]);

        return $stmt->rowCount();
    }

    public static function update($id, $name)
    {
        $stmt = Databaser::runQuery('UPDATE category SET name = ? WHERE id = ?', [$name, $id]);

        return $stmt->rowCount();
    }
}
