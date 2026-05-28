<?php

require_once 'helpers/Databaser.php';
class User{
    public static function create($name, $password, $role){
        $stmt = Databaser::runQuery("INSERT INTO user (name, password, role) VALUES (?, ?, ?)", [$name, $password, $role]);
        return $stmt->rowCount();
    }
    public static function delete($id){
        $stmt = Databaser::runQuery('DELETE FROM user WHERE id = ?', [$id]);
        return $stmt->rowCount();  
    }
}
