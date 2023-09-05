<?php

namespace app\Controllers;

use app\Http\Request;

class UserController
{
    public function index()
    {
        include 'views/users/index.php';
    }

    public function show(Request $request)
    {
        include 'views/users/show.php';
    }

    public function edit(Request $request)
    {
        include 'views/users/edit.php';
    }
}