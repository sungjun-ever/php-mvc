<?php

namespace app\Middleware;

use app\Http\Request;
use app\Http\Response;

class IsAdmin
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function process(Request $request, Response $response)
    {
        return $response;
    }
}