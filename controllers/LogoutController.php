<?php

require_once 'helpers/Auther.php';
require_once 'models/Token.php';

class LogoutController{
    public static function logout(){
        $token = Auther::getBearerToken();
        $result = Token::delete($token);
        if($result > 0) Responser::ok('logout success');
        Responser::bad('logout failed, this token is not valid');
    }
}
