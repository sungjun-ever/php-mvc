<?php

namespace app\Controllers;

use app\Http\Request;

class UserController
{
    public function index()
    {
        include 'views/users/index.php';
    }

    public function post(Request $request)
    {
        print_r($request->getBody());
//        header("Location:http://localhost:3000/users/1");
    }

    public function show(Request $request)
    {
        print_r($request->getBody());
        include 'views/users/show.php';
    }

    public function edit(Request $request)
    {
        print_r($request->getBody());
        include 'views/users/edit.php';
    }

}