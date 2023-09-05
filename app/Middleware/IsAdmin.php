<?php

namespace app\Middleware;

use app\Http\Request;

class IsAdmin
{
    private $request = '';

    /**
     * @param Request $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }


}