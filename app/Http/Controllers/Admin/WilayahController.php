<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\Dusun;
use App\Http\Controllers\Controller;
use App\Kota;
use App\Kecamatan;
use App\Provinsi;
use App\RW;
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

    public function desa()  
    {
        $villages = Desa::paginate(5);
        return view('dashboard.admin.desa',compact('villages'));
    }
    public function desaEdit($id)
    {
        $villages = Desa::where('id',$id)->first();
        return view('dashboard.admin.edit-desa',['villages' => $villages]);
    }
    public function desaUpdate(Request $request, $id)
    {
        $villages = Desa::where('id',$id)->update([
            'kode_desa_bps'         => $request->kode_desa_bps,
            'kode_desa_kemendagri'  => $request->kode_desa_kemendagri,
            'nama_desa'             => $request->nama_desa
        ]);
    }

    public function dusun()
    {
        $dusun = Dusun::paginate(5);
        $desa = Desa::all();
        return view('dashboard.admin.dusun',compact('dusun','desa'));
    }

    public function dusunStore(Request $request)
    {
        $dusun = Dusun::create([
            'kode_dusun_bps'        => $request->kode_dusun_bps,
            'kode_dusun_kemendagri' => $request->kode_dusun_kemendagri,
            'nama_dusun'            => $request->nama_dusun,
            'luas_wilayah'          => $request->luas_wilayah,
            'id_desa'               => $request->id_desa
        ]);
        return redirect()->route('dashboard.admin.dusun')->with('sukses', 'Data berhasil disimpan');
    }
    public function dusunEdit($id)
    {
        $dusun = Dusun::where('id',$id)->first();
        $desa = Desa::where('id',$id)->orderBy('nama_desa','ASC')->get();
        return view('dashboard.admin.edit-dusun',['dusun' => $dusun,'desa' => $desa]);  
    }

    public function dusunUpdate(Request $request, $id)
    {
        $dusun = Dusun::where('id',$id)->update([
            'kode_dusun_bps'    => $request->kode_dusun_bps,
            'kode_dusun_kemendagri' => $request->kode_dusun_kemendagri,
            'nama_dusun'            => $request->nama_dusun,
            'luas_wilayah'          => $request->luas_wilayah,
            'id_desa'               => $request->id_desa
        ]);
        return redirect()->route('dashboard.admin.dusun')->with('sukses', 'Data berhasil diupdate');
    }

    public function rw()
    {
        $rw = RW::paginate(5);
        return view('dashboard.admin.rw',compact('rw'));
    }
}
