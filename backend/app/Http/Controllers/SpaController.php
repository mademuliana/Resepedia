<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function index(Request $request)
    {   
        return view('layouts/vue');
    }
    public function home(Request $request)
    {   
        return view('welcome');
    }
}
