<?php

namespace app\Middleware;

use app\Http\PrevRequestVer;
use app\Http\Response;

class IsAdmin
{
    /**
     * @param PrevRequestVer $request
     * @param Response $response
     * @return Response
     */
    public function process(PrevRequestVer $request, Response $response)
    {
        return $response;
    }
}