<?php

require_once 'helpers/Databaser.php';
class User
{
    public static function create($name, $password, $role)
    {
        $stmt = Databaser::runQuery('INSERT INTO user (name, password, role) VALUES (?, ?, ?)', [$name, $password, $role]);

        return $stmt->rowCount();
    }

    public static function delete($id)
    {
        $stmt = Databaser::runQuery('DELETE FROM user WHERE id = ?', [$id]);

        return $stmt->rowCount();
    }

    public static function update($id, $name, $password)
    {
        $stmt = Databaser::runQuery('UPDATE user SET name = ?, password = ? WHERE id = ?', [$name, $password, $id]);

        return $stmt->rowCount();
    }

    public static function getAll($limit, $offset)
    {
        $stmt = Databaser::runQuery('SELECT * FROM user LIMIT ? OFFSET ?', [$limit, $offset]);

        return $stmt->fetchAll();
    }

    public static function getById($id)
    {
        $stmt = Databaser::runQuery('SELECT * FROM user WHERE id = ?', [$id]);

        return $stmt->fetch();
    }

    public static function getByName($name)
    {
        $stmt = Databaser::runQuery('SELECT * FROM user WHERE BINARY name = ?', [$name]);

        return $stmt->fetch();
    }
}
