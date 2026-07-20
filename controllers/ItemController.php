<?php
require_once 'helpers/Inputter.php';
require_once 'models/Item.php';
require_once 'helpers/Responser.php';


class ItemController{
    public static function create(){
        $sku = strtoupper(Inputter::requiredBodyData('sku'));
        $name = ucwords(strtolower(Inputter::requiredBodyData('name')));
        $category_id = Inputter::getBodyData('category_id') ?? null;
        $description = Inputter::getBodyData('description') ?? null;

        $result = Item::create($sku, $name, $category_id, $description);
        if($result > 0) Responser::ok('Successfully created new item');
        Responser::bad('Failed to create new item');
    }
}
