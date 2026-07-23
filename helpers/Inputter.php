<?php

require_once 'helpers/Responser.php';
class Inputter
{
    public static function getAllBody()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public static function getBodyData($itemName)
    {
        $data = self::getAllBody()[$itemName] ?? null;

        return $data;
    }

    public static function requiredBodyData($itemName)
    {
        $data = self::getBodyData($itemName);
        if (empty($data)) {
            Responser::bad(['message' => $itemName.' is required to continue']);
        }

        return $data;
    }
}
