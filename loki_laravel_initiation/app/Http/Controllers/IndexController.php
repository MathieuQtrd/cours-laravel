<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() 
    {
        // Traitements PHP
        // ...

        return view('index');
    }
}
