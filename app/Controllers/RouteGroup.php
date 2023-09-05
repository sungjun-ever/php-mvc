<?php

namespace app\Controllers;

class RouteGroup
{
    private $router;
    private $prefix;

    /**
     * @param $router Router
     * @param $prefix
     */
    public function __construct($router, $prefix)
    {
        $this->router = $router;
        $this->prefix = $prefix;
    }

    public function addRoute($method, $url, $handler)
    {
        if ($url === '/') $url = '';
        $prefixedUrl = $this->prefix . $url;
        $this->router->addRoute($method, $prefixedUrl, $handler);
    }

    public function group(callable $callable)
    {
        $callable($this);
    }
}