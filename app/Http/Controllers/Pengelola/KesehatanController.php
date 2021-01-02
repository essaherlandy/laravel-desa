<?php

namespace App\Http\Controllers\Pengelola;

use App\GiziBuruk;
use App\KondisiKehamilan;
use App\Penduduk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    public function Gizi(Request $request)
    {
        $giziBuruk = GiziBuruk::paginate(10);
        return view('dashboard.pengelola.kesehatan.gizi-buruk',compact('giziBuruk'));
    }

    public function giziCreate()
    {   
        $penduduk = Penduduk::get();
        return view('dashboard.pengelola.kesehatan.gizi-buruk-create',[
            'penduduk'      => $penduduk
        ]);
    }

    public function getGizi(Request $request)
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

    public function giziStore(Request $request)
    {
        $giziBuruks = GiziBuruk::create([
            'id_penduduk'       => $request->id_penduduk,
            'berat_badan'       => $request->berat_badan,
            'tinggi_badan'      => $request->tinggi_badan,
            'tgl_timbang'       => $request->tgl_timbang
        ]);
        return redirect()->route('dashboard.pengelola.kesehatan.gizi-buruk')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function giziUpdate(Request $request, $id)
    {
        $giziBuruks = GiziBuruk::where('id',$id)->update([
            'id_penduduk'       => $request->id_penduduk,
            'berat_badan'       => $request->berat_badan,
            'tinggi_badan'      => $request->tinggi_badan,
            'tgl_timbang'       => $request->tgl_timbang
        ]);
        return redirect()->route('dashboard.pengelola.kesehatan.gizi-buruk')->with('sukses', 'Data berhasil diupdate!');
    }

    public function giziDelete($id)
    {
        $kehamilans = GiziBuruk::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.kesehatan.gizi-buruk')->with('sukses', 'Data berhasil dihapus!');
    }

    /*Kondisi Kehamilan*/

    public function kehamilan()
    {
        $kehamilans = KondisiKehamilan::paginate(10);
        return view('dashboard.pengelola.kesehatan.kehamilan',compact('kehamilans'));
    }

    public function getKehamilan(Request $request)
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

    public function kehamilanCreate(Request $request)
    {
        $penduduk = Penduduk::get();
        return view('dashboard.pengelola.kesehatan.kehamilan-create',[
            'penduduk'      => $penduduk
        ]);
    }

    public function kehamilanStore(Request $request)
    {
        $giziBuruks = KondisiKehamilan::create([
            'id_penduduk'       => $request->id_penduduk,
            'keterangan'        => $request->keterangan,
            'tgl_hpl'           => $request->tgl_hpl,
            'is_resti'          => $request->is_resti
        ]);
        return redirect()->route('dashboard.pengelola.kesehatan.kehamilan')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function kehamilanUpdate(Request $request,$id)
    {
        $giziBuruks = KondisiKehamilan::where('id',$id)->update([
            'id_penduduk'       => $request->id_penduduk,
            'keterangan'        => $request->keterangan,
            'tgl_hpl'           => $request->tgl_hpl,
            'is_resti'          => $request->is_resti
        ]);
        return redirect()->route('dashboard.pengelola.kesehatan.kehamilan')->with('sukses', 'Data berhasil update!');
    }

    public function kehamilanDelete($id)
    {
        $kehamilans = KondisiKehamilan::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.kesehatan.kehamilan')->with('sukses', 'Data berhasil dihapus!');
    }
}
