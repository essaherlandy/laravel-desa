<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Kegiatan;
use App\Logo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $logo = Logo::first();
        $beritas = Berita::all();
        $kegiatans = Kegiatan::all();
        $kegiatans = Kegiatan::all();
        return view('welcome',['logo' => $logo,'beritas' => $beritas,'kegiatans' => $kegiatans]);
    }

    public function detailKegiatan(Request $request, $slug)
    {
        $kegiatans = Kegiatan::where('slug',$slug)->first();

        return view('detail-kegiatan');
    }
}
