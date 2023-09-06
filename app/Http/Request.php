<?php

namespace app\Http;

class Request
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
        $requestBody = '';
        $bodyParam = [];
        if (in_array($this->getMethod(), ['POST', 'PUT', 'PATCH']) && !empty($this->body)) {
            if ($this->getHeaders()['Content-Type'] === 'application/x-www-form-urlencoded') {
                $requestBody = explode('&', $this->body);
                foreach ($requestBody as $r) {
                    $param = explode('=', $r);
                    $bodyParam[$param[0]] = $param[1];
                }
            }

            if ($this->getHeaders()['Content-Type'] === 'application/json') {
                $bodyParam = [];
            }
        }

        if ($this->getMethod() === 'GET') {

        }
        return $bodyParam;
    }

    /**
     * 모든 request 정보
     * @return array
     */
    public function all()
    {
        return [
            'url' => $this->getUrl(),
            'method' => $this->getMethod(),
            'headers' => $this->getHeaders(),
            'body' => $this->getBody()
        ];
    }


}