<?php

namespace App\Http\Controllers\Pengelola;

use App\Penduduk;
use App\PerangkatDesa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function perangkat()
    {
        $perangkats = PerangkatDesa::paginate(10);
        return view('dashboard.pengelola.perangkat.data-perangkat',compact('perangkats'));
    }

    public function getPerangkat(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $penduduks = Penduduk::orderby('nik','asc')->select('id','nik','nama')->limit(5)->get();
        }else{
            $penduduks = Penduduk::orderby('nik','asc')->select('id','nik','nama')->where('nik', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($penduduks as $penduduk){
            $response[] = array(
                "value"=>$penduduk->id,
                "label"=>$penduduk->nik. ' | ' .$penduduk->nama,
                "nik"=>$penduduk->nik,
                "nama"=>$penduduk->nama
            );
        }

        return response()->json($response);
    }

    public function perangkatCreate(Request $request)
    {
        $penduduks = Penduduk::where('id','4')->first();
        return view('dashboard.pengelola.perangkat.perangkat-create',[
            'penduduks'         => $penduduks,
        ]);
    }

    public function perangkatStore(Request $request)
    {
        $perangkats = PerangkatDesa::create([
            'id_penduduk'       => $request->id_penduduk,
            'nama'              => $request->nama,
            'jabatan'           => $request->jabatan,
        ]);
        return redirect()->route('dashboard.pengelola.perangkat.data-perangkat')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function perangkatEdit(Request $request, $id)
    {
        $perangkat = PerangkatDesa::where('id',$id)->first();
        return view('dashboard.pengelola.perangkat.perangkat-edit',[
            'perangkat'         => $perangkat,
        ]);
    }

    public function perangkatUpdate(Request $request, $id)
    {
        $perangkats = PerangkatDesa::where('id',$id)->update([
            'id_penduduk'       => $request->id_penduduk,
            'nama'              => $request->nama,
            'jabatan'           => $request->jabatan,
        ]);
        return redirect()->route('dashboard.pengelola.perangkat.data-perangkat')->with('sukses', 'Data berhasil diupdate!');
    }

    public function perangkatDelete($id)
    {
        $perangkat = PerangkatDesa::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.perangkat.data-perangkat')->with('sukses', 'Data berhasil dihapus!');
    }
}
