<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Logo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $logo = Logo::first();
        $beritas = Berita::all();
        return view('welcome',['logo' => $logo,'beritas' => $beritas]);
    }
}
