<?php

namespace app\Middleware;

class Middleware
{
    // 사용할 미들웨어 클래스 등록
    // key => class
    protected $middlewares = [];
    private $middleware = '';

    /**
     * @param $middleware
     */
    public function __construct($middleware)
    {
        $this->middleware = $this->middlewares[$middleware];
    }
}