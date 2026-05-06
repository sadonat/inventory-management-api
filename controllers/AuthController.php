<?php

require_once 'helpers/Inputter.php';
require_once 'models/Users.php';
require_once 'models/Tokens.php';
require_once 'helpers/Auther.php';
require_once 'helpers/Responser.php';
class AuthController
{
    public static function login()
    {
        $name = Inputter::requiredBodyData('name');
        $password = Inputter::requiredBodyData('password');

        $user = Users::getUser(null, $name);

        if (! $user) {
            Responser::bad(['messsage' => 'user not found']);
        }

        if (password_verify($password, $user['password'])) {
            $existingToken = Tokens::get($user['id']);
            $token = Auther::generateToken();
            if (empty($existingToken)) {
                Tokens::create($token, $user['id']);
            } else {
                Tokens::update($existingToken['id'], $token);
            }
            Responser::ok(['token' => $token]);
        } else {
            Responser::bad();
        }
    }

    public static function auth()
    {
        $token = Auther::getBearerToken();
        if (empty($token)) {
            Responser::bad(['message' => 'unauthorized']);
        }
        $existingToken = Tokens::getUser($token);
        if ($existingToken) {
            return $existingToken;
        }
        Responser::bad(['message' => 'unauthorized']);
    }
}
