<?php

use App\Controllers\TestController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        $controller = new TestController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        break;
}