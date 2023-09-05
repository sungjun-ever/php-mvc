<?php

namespace app\Controllers;
use app\Http\Request;
use app\Middleware\Middleware;

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
            $pattern = preg_replace('/{([^}]+)}/', '([^/]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if ($key !== 0) {
                        $params[$key] = $value;
                    }
                }
                $request = new Request();
                $request->merge($params);

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


    public function middleware($middlewareKey)
    {
        return new Middleware($this, $middlewareKey);
    }

}