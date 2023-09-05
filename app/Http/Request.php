<?php

namespace app\Http;

class Request
{
    private $data = [];

    /**
     * @param array $data
     */
    public function __construct()
    {
        $this->data = $_REQUEST;
    }

    public function input($key, $default = null)
    {
        return $this->data[$key] ?: $default;
    }

    public function merge($data)
    {
        $this->data = array_merge($this->data, $data);
    }

    public function all()
    {
        return $this->data;
    }


}