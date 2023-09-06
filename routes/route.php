<?php

use app\Controllers\HomeController;
use app\Controllers\Router;
use app\Controllers\UserController;
use app\Http\Request;

$router = new Router();

$router->addRoute('GET', '/', function () {
    $controller = new HomeController();
    $controller->index();
});

$router->prefix('/users')->group(function ($router){
    $router->addRoute('GET', '/', function () {
        $controller = new UserController();
        $controller->index();
    });

    $router->addRoute('POST', '/', function (Request $request) {
        $controller = new UserController();
        $controller->post($request);
    });

    $router->addRoute('GET', '/{id}', function (Request $request) {
        $controller = new UserController();
        $controller->show($request);
    });

    $router->addRoute('GET', '/{id}/edit', function (Request $request) {
        $controller = new UserController();
        $controller->edit($request);
    });
});



$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
