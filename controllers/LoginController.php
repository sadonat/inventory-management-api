<?php

require_once 'helpers/Auther.php';
require_once 'helpers/Responser.php';
require_once 'models/User.php';
require_once 'models/Token.php';
require_once 'helpers/Inputter.php';
require_once 'helpers/Auther.php';

class LoginController
{
    public static function login()
    {
        $name = Inputter::requiredBodyData('name');
        $password = Inputter::requiredBodyData('password');

        $account = User::getByName($name);
        if (empty($account)) {
            Responser::bad('User not found!');
        }

        if (password_verify($password, $account['password'])) {
            $token = Auther::generateToken();
            $existing_token = Token::getByUserId($account['id']);

            if (empty($existing_token)) {
                $result = Token::create($account['id'], $token);
                Responser::ok('Token successfully created', ['token' => $token]);
            }
            $result = Token::update($account['id'], $token);
            Responser::ok('Token successfully updated', ['token' => $token]);
        }

        Responser::bad('Wrong password');
    }
}
