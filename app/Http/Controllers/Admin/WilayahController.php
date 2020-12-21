<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kota;
use App\Kecamatan;
use App\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function provinsi()
    {
        $provinsi = Provinsi::paginate(5);
        return view('dashboard.admin.provinsi',['provinsi' => $provinsi]);
    }
    public function provinsiEdit(Request $request, $id)
    {
        $provinsi = Provinsi::where('id',$id)->first();
        return view('dashboard.admin.edit-provinsi',['provinsi' => $provinsi]);
    }

    public function provinsiUpdate(Request $request, $id)
    {
        $provinsi = Provinsi::where('id',$id)->update([
            'kode_provinsi_bps'   => $request->kode_provinsi_bps,
            'kode_provinsi_kemendagri'        => $request->kode_provinsi_kemendagri,
            'nama_provinsi'  => $request->nama_provinsi,
            'luas_wilayah'    => $request->luas_wilayah
        ]);
        return redirect()->route('dashboard.admin.provinsi')->with('sukses', 'Data berhasil diupdate');
    }

    /* Kabupaten */
    public function kota()
    {
        $kotas = Kota::paginate(5);
        return view('dashboard.admin.kabupaten-kota',compact('kotas'));
    }

    public function kabEdit(Request $request, $id)
    {
        $kotas = Kota::where('id',$id)->first();
        return view('dashboard.admin.edit-kabupaten-kota',compact('kotas'));
    }

    public function kabUpdate(Request $request, $id)
    {
        $kotas = Kota::where('id',$id)->update([
            'kode_kab_kota_bps'             => $request->kode_kab_kota_bps,
            'kode_kab_kota_kemendagri'      => $request->kode_kab_kota_kemendagri,
            'nama_kab_kota'                 => $request->nama_kab_kota,
            'luas_wilayah'                  => $request->luas_wilayah,
            'id_provinsi'                  => $request->id_provinsi
        ]);
        return redirect()->route('dashboard.admin.kabupaten-kota')->with('sukses', 'Data berhasil diupdate');
    }

    /* Kecamatan */

    public function kecamatan()
    {
        $kecamatans = Kecamatan::paginate(5);
        return view('dashboard.admin.kecamatan',compact('kecamatans'));
    }
    
    public function kecEdit(Request $request, $id)  
    {
        $kecamatans = Kecamatan::where('id',$id)->first();
        return view('dashboard.admin.edit-kecamatan',['kecamatans' => $kecamatans]);
    }

    public function kecUpdate(Request $request, $id)
    {
        $kecamatans = Kecamatan::where('id',$id)->update([
            'kode_kecamatan_bps'             => $request->kode_kecamatan_bps,
            'kode_kecamatan_kemendagri'      => $request->kode_kecamatan_kemendagri,
            'nama_kecamatan'                 => $request->nama_kecamatan,
            'luas_wilayah'                  => $request->luas_wilayah,
            'id_kab_kota'                  => $request->id_kab_kota
        ]);

        return redirect()->route('dashboard.admin.kecamatan')->with('sukses', 'Data berhasil diupdate');
    }
}
