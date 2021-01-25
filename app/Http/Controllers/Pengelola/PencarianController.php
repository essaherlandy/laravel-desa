<?php

namespace App\Http\Controllers\Pengelola;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.pengelola.pencarian.index');
    }
}
