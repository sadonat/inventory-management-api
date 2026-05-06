<?php

require_once 'models/Users.php';
require_once 'helpers/Responser.php';
require_once 'helpers/Auther.php';
require_once 'models/Tokens.php';
require_once 'helpers/Inputter.php';

class UsersController
{
    public static function users()
    {
        $users = Users::all();
        Responser::ok($users);
    }

    public static function getUser()
    {
        $id = Inputter::requiredBodyData('id');
        $stmt = Users::getUser($id, null);
        if (empty($stmt)) {
            Responser::bad();
        }
        Responser::ok($stmt);
    }

    public static function create()
    {
        $role = AuthController::auth();
        $name = Inputter::requiredBodyData('name');
        $password = Inputter::requiredBodyData('password');
        $role = Inputter::getBodyData('role');

        $stmt = Users::create($name, password_hash($password, PASSWORD_DEFAULT), $role ?? 'staff');
        if ($stmt > 0) {
            Responser::ok(['message' => 'user successfully created', 'role' => $role]);
        }
        Responser::bad(['message' => 'cannot create user']);
    }

    public static function delete()
    {
        $id = Inputter::requiredBodyData('id');
        $stmt = Users::delete($id);
        if ($stmt > 0) {
            Responser::ok(['message' => 'user successfully deleted']);
        }
        Responser::bad(['message' => 'user not found']);
    }

    public static function update(){
      $id = Inputter::requiredBodyData('id');
      $name = Inputter::requiredBodyData('name');
      $password = Inputter::requiredBodyData('password');

      $stmt = Users::update($id, $name, password_hash($password, PASSWORD_DEFAULT));

      if($stmt > 0)Responser::ok(['message'=> 'user successfully updated']);

      Responser::bad();
    }
}
