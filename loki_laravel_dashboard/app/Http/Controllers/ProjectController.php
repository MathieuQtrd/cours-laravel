<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index () 
    {
        // $user = auth()->user();
        $user = Auth::user();
    }
}
