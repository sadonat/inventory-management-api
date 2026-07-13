<?php

require_once 'models/Category.php';
require_once 'helpers/Responser.php';
require_once 'helpers/Inputter.php';
require_once 'helpers/Responser.php';

class CategoryController{
    public static function create(){
        $name = Inputter::requiredBodyData('name');
        $result = Category::create($name);
        if($result > 0) Responser::ok('Category successfully created!');
        Responser::bad('Failed to create new category');
    }
}
