<?php

use app\Controllers\HomeController;
use app\Controllers\Router;
use app\Controllers\UserController;
use app\Http\Request;
use app\Middleware\IsAdmin;

$router = new Router();

$router->addRoute('GET', '/', function () {
    $controller = new HomeController();
    $controller->index();
})->middleware(new IsAdmin());

$router->prefix('/users')->group(function ($router){
    $router->addRoute('GET', '/', function () {
        $controller = new UserController();
        $controller->index();
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


