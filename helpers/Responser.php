<?php

class Responser
{
    private static function return_response($code = 200, $status = 'ok', $message = null, $data = 'no data returned')
    {
        http_response_code($code);
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
        exit;
    }

    public static function ok($message, $data = null)
    {
        self::return_response(200, 'ok', $message, $data);
    }

    public static function bad($message, $data = null)
    {
        self::return_response(400, 'bad request', $message, $data);
    }

    public static function custom($code, $status, $message, $data)
    {
        self::return_response($code, $status, $message, $data);
    }
}
