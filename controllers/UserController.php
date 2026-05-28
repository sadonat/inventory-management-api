<?php

require_once 'helpers/Responser.php';
require_once 'models/User.php';
require_once 'helpers/Inputter.php';

class UserController{
    public static function create(){
        $name = Inputter::requiredBodyData('name');
        $password = password_hash(Inputter::requiredBodyData('password'), PASSWORD_DEFAULT);
        $role = Inputter::getBodyData('role') ?? 'staff';

        $result = User::create($name, $password, $role);

        if($result > 0)Responser::ok(["message"=> "User successfully created"]);

        Responser::bad(['message' => 'Failed to create new user']);
    }
    public static function delete($paths){
        $id = $paths[1] ?? null;
        if(empty($id)) Responser::bad(['message' => 'User id not specified!']);
        $result = User::delete($id);

        if($result > 0)Responser::ok(['message' => 'User successfully deleted']);

        Responser::bad(['message' => 'Cannot find user with that id, failed to delete user']);
    }
}
