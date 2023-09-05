<?php

namespace app\Middleware;

use app\Controllers\Router;

class Middleware
{
    private $router = '';
    // 사용할 미들웨어 클래스 등록
    // key => class
    protected $middlewares = [];
    private $middleware = '';


    /**
     * @param $router Router
     * @param $middleware
     */
    public function __construct($router, $middleware)
    {
        $this->router = $router;
        $this->middleware = $this->middlewares[$middleware];
    }
}