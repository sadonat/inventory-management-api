<?php

require_once 'helpers/Responser.php';
require_once 'models/User.php';
require_once 'helpers/Inputter.php';
require_once 'controllers/AuthController.php';

class UserController
{
    public static function get($paths)
    {
        $id = $paths[1] ?? null;
        if (! empty($id)) {
            $result = User::getById($id);
            if (empty($result)) {
                Responser::bad(['message' => 'User not found']);
            }
            Responser::ok($result);
        }
        $limit = $_GET['limit'] ?? 20;
        $offset = $_GET['offset'] ?? 0;
        $result = User::getAll($limit, $offset);
        Responser::ok($result);
    }

    public static function create()
    {
        Auth::requiredPrivilegeLevel(2);
        $name = Inputter::requiredBodyData('name');
        $password = password_hash(Inputter::requiredBodyData('password'), PASSWORD_DEFAULT);
        $role = Inputter::getBodyData('role') ?? 'staff';

        $result = User::create($name, $password, $role);

        if ($result > 0) {
            Responser::ok(['message' => 'User successfully created']);
        }

        Responser::bad(['message' => 'Failed to create new user']);
    }

    public static function delete($paths)
    {
        $id = $paths[1] ?? null;
        if (empty($id)) {
            Responser::bad(['message' => 'User id not specified!']);
        }
        $result = User::delete($id);

        if ($result > 0) {
            Responser::ok(['message' => 'User successfully deleted']);
        }

        Responser::bad(['message' => 'Cannot find user with that id, failed to delete user']);
    }

    public static function update($paths)
    {
        $id = $paths[1] ?? null;
        if (empty($id)) {
            Responser::bad(['message' => 'User id not specified!']);
        }
        $name = Inputter::requiredBodyData('name');
        $password = password_hash(Inputter::requiredBodyData('password'), PASSWORD_DEFAULT);

        $result = User::update($id, $name, $password);
        if ($result > 0) {
            Responser::ok(['message' => 'User successfully updated']);
        }

        Responser::bad(['message' => 'Failed to update new user']);

    }
}
