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
        print_r($request->all());
//        print_r($request->getBody());
//        header("Location:http://localhost:3000/users/1");
    }

    public function show(Request $request)
    {
        print_r($request->all());
//        foreach ((array)$request as $key => $value) {
//            print_r($key);
//            echo '<br>';
//            print_r($value);
//            echo '<br>';
//        }
        include 'views/users/show.php';
    }

    public function edit(Request $request)
    {
        include 'views/users/edit.php';
    }
}