<?php

namespace app\Controllers;
use app\Http\PrevRequestVer;
use app\Http\Request;

class Router
{
    private $routes = [];

    /**
     * @param $method String : http method
     * @param $url String : request url
     * @param $handler : controller
     * @return Router
     */
    public function addRoute($method, $url, $handler)
    {
        if (!isset($this->routes[$method])) {
            $this->routes[$method] = [];
        }

        $this->routes[$method][$url] = $handler;
        return new self;
    }


    /**
     * @param $method
     * @param $url
     * @return void
     */
    public function route($method, $url)
    {
        $params = [];

        foreach ($this->routes[$method] as $route => $handler) {
            $pattern = preg_replace_callback('/{([^}]+)}/', function ($matches) use (&$params) {
                $paramName = $matches[1];
                $params[$paramName] = null; // 기본값 설정 (null 또는 다른 기본값으로 변경 가능)
                return '([^/]+)'; // 동적 매개변수에 대한 정규식
            }, $route);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if ($key !== 0) {
                        $paramName = array_keys($params)[$key - 1];
                        $params[$paramName] = $value;
                    }
                }

                $request = new Request();
                $request->setUrlParam($params);

                $handler($request);
                return;
            }
        }
        include 'views/404.php';
    }

    /**
     * @param $prefix
     * @return RouteGroup
     */
    public function prefix($prefix)
    {
        return new RouteGroup($this, $prefix);
    }


//    public function middleware($middlewareKey)
//    {
//        return new Middleware();
//    }

}