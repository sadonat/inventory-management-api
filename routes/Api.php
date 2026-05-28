<?php

require_once 'helpers/Router.php';
require_once 'controllers/UserController.php';

// ROUTING
Router::addDefault();
Router::add("user", "POST", [UserController::class, "create"]);
Router::add("user", "DELETE", [UserController::class, "delete"]);
Router::run();
