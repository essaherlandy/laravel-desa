<?php

namespace App\Http\Controllers\Admin;

use App\Penduduk;
use App\Perangkat;
use App\PangkatGolongan;
use App\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function perangkat()
    {
        $perangkats = Perangkat::paginate(10);
        return view('dashboard.admin.perangkat.data-perangkat',compact('perangkats'));
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
        $jabatan = Jabatan::orderBy('deskripsi','ASC')->get();
        $pangkatGolongan = PangkatGolongan::orderBy('deskripsi','ASC')->get();
        $penduduks = Penduduk::where('id','4')->first();
        return view('dashboard.admin.perangkat.perangkat-create',[
            'penduduks'         => $penduduks,
            'jabatan'           => $jabatan,
            'pangkatGolongan'   => $pangkatGolongan,
        ]);
    }

    public function perangkatStore(Request $request)
    {
        $perangkats = Perangkat::create([
            'id_penduduk'           => $request->id_penduduk,
            'id_pangkat_gol'        => $request->id_pangkat_gol,
            'id_jabatan'            => $request->id_jabatan,
            'nip'                   => $request->nip,
            'niap'                  => $request->niap,
            'no_sk_angkat'          => $request->no_sk_angkat,
            'tgl_angkat'            => $request->tgl_angkat,
            'no_sk_berhenti'        => $request->no_sk_berhenti,
            'tgl_berhenti'          => $request->tgl_berhenti,
        ]);
        return redirect()->route('dashboard.admin.perangkat.data-perangkat')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function perangkatEdit(Request $request, $id)
    {
        $jabatan = Jabatan::orderBy('deskripsi','ASC')->get();
        $pangkatGolongan = PangkatGolongan::orderBy('deskripsi','ASC')->get();
        $penduduks = Penduduk::where('id','4')->first();
        $perangkat = Perangkat::where('id',$id)->first();
        return view('dashboard.admin.perangkat.perangkat-edit',[
            'perangkat'         => $perangkat,
            'penduduks'         => $penduduks,
            'jabatan'           => $jabatan,
            'pangkatGolongan'   => $pangkatGolongan,
        ]);
    }

    public function perangkatUpdate(Request $request, $id)
    {
        $perangkats = Perangkat::where('id',$id)->update([
            'id_penduduk'           => $request->id_penduduk,
            'id_pangkat_gol'        => $request->id_pangkat_gol,
            'id_jabatan'            => $request->id_jabatan,
            'nip'                   => $request->nip,
            'niap'                  => $request->niap,
            'no_sk_angkat'          => $request->no_sk_angkat,
            'tgl_angkat'            => $request->tgl_angkat,
            'no_sk_berhenti'        => $request->no_sk_berhenti,
            'tgl_berhenti'          => $request->tgl_berhenti,
        ]);
        return redirect()->route('dashboard.admin.perangkat.data-perangkat')->with('sukses', 'Data berhasil diupdate!');
    }

    public function perangkatDelete($id)
    {
        $perangkat = Perangkat::where('id',$id)->delete();
        return redirect()->route('dashboard.admin.perangkat.data-perangkat')->with('sukses', 'Data berhasil dihapus!');
    }
}
