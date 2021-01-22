<?php

namespace App\Http\Controllers\Pengelola;

use App\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SosialPendudukController extends Controller
{
    public function sosial(Request $request)
    {   
        $penduduk = Penduduk::has('keluarga')
                    ->with('keluarga')
                    ->where(function($p) use($request){
                        $p->whereHas('keluarga', function($p) use($request){
                            $p->where('id_kelas_sosial',[3,4]);
                        });
                    })->paginate(10);
        return view('dashboard.pengelola.sosial.sosial-penduduk',compact('penduduk'));
    }

    public function siswa()
    {
        $penduduk = Penduduk::where('is_bsm','Y')->paginate(10);
        return view('dashboard.pengelola.sosial.siswa-miskin',compact('penduduk'));
    }
}
