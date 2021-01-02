<?php

namespace App\Http\Controllers;

use App\Penduduk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){

            return view('dashboard.admin.dashboard');
        }elseif(auth()->user()->role == 'pengelola'){
            
            $penduduk = Penduduk::where('id_jenis_kelamin','2')->get();
            $data = [];

            foreach($penduduk as $jk){
                $data[] = $jk->jenis_kelamin->deskripsi;
            }
            
            return view('dashboard.pengelola.index',[
                'penduduk'  => $penduduk,
                'data'      => $data,
            ]);
        }
    }
}
