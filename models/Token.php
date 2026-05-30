<?php

require_once 'helpers/Databaser.php';

class Token
{
    public static function create($user_id, $token)
    {
        $stmt = Databaser::runQuery('INSERT INTO token (user_id, token, expired_at) VALUES ( ?, ?, DATE_ADD(NOW(), INTERVAL 7 DAY))', [$user_id, $token]);

        return $stmt->rowCount();
    }

    public static function getByUserId($user_id)
    {
        $stmt = Databaser::runQuery('SELECT * FROM token WHERE user_id = ?', [$user_id]);

        return $stmt->fetch();
    }

    public static function update($user_id, $token)
    {
        $stmt = Databaser::runQuery('UPDATE token SET token = ?,created_at = NOW(), expired_at = DATE_ADD(NOW(), INTERVAL 7 DAY) WHERE user_id = ?', [$token, $user_id]);
    }
}
