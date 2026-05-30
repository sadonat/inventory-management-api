<?php

require_once 'helpers/Router.php';
require_once 'controllers/UserController.php';
require_once 'controllers/LoginController.php';

// ROUTING
Router::addDefault();
Router::add('user', 'POST', [UserController::class, 'create']);
Router::add('user', 'DELETE', [UserController::class, 'delete']);
Router::add('user', 'PUT', [UserController::class, 'update']);
Router::add('user', 'GET', [UserController::class, 'get']);

Router::add('login', 'POST', [LoginController::class, 'login']);
Router::run();
