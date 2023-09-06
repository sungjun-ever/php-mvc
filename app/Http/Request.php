<?php

namespace app\Http;

class Request2
{
    private $url;
    private $method;
    private $headers;
    private $body;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->headers = getallheaders();
        $this->body = file_get_contents('php://input');
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array|false
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * 모든 request 정보
     * @return array
     */
    public function all()
    {
        return [
            $this->getUrl(),
            $this->getMethod(),
            $this->getHeaders(),
            $this->getBody()
        ];
    }


}