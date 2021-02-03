<?php

namespace App\Http\Controllers\Pengelola;


use App\JenisKelamin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        $jenisKelamin = JenisKelamin::get();
        return view('dashboard.pengelola.pencarian.index',[
            'jenisKelamin'      => $jenisKelamin
        ]);
    }
}
