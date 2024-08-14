<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;

function authMiddleware(): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit();
    }
}

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;

    case '/login':
        $controller = new AuthController();
        $controller->index();
        break;

    case '/register':
        $controller = new AuthController();
        $controller->register();
        break;

    case '/post-register':
        $controller = new AuthController();
        $controller->postRegister();
        break;

    case '/post-login':
        $controller = new AuthController();
        $controller->postLogin();
        break;

    case '/dashboard':
        authMiddleware();
        $controller = new DashboardController();
        $controller->index();
        break;

    case '/deposit':
        authMiddleware();
        $controller = new DashboardController();
        $controller->getDeposit();
        break;


    case '/withdraw':
        authMiddleware();
        $controller = new DashboardController();
        $controller->getWithdraw();
        break;


    case '/transfer':
        authMiddleware();
        $controller = new DashboardController();
        $controller->getTransfer();
        break;

    default:
        http_response_code(404);
        break;
}