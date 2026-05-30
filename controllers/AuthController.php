<?php

require_once 'helpers/Auther.php';
require_once 'helpers/Responser.php';
require_once 'models/User.php';
require_once 'models/Token.php';

class Auth
{
    public static function getRole()
    {
        $bearedToken = Auther::getBearerToken();
        $existingToken = Token::getByToken($bearedToken);

        if (! $existingToken) {
            Responser::bad(['message' => 'Unauthorized']);
        }

        $account = User::getById($existingToken['user_id']);

        return $account['role'];
    }

    public static function requiredPrivilegeLevel($level)
    {
        $userRole = self::getRole();
        $userPrivilegeLevel = $userRole == 'admin' ? 2 : 1;

        if ($userPrivilegeLevel >= $level) {
            return true;
        }
        Responser::bad(['message' => 'Insufficient privilege']);
    }
}
