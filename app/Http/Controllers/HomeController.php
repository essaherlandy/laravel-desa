<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $logo = Logo::first();
        return view('welcome',['logo' => $logo]);
    }
}
