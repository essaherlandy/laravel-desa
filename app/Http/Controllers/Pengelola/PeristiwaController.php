<?php

namespace App\Http\Controllers\Pengelola;


use App\Perangkat;
use App\Meninggal;
use App\JenisKelamin;
use App\Jabatan;
use App\Penduduk;
use App\Pelapor;
use App\PindahMasuk;
use App\Kelahiran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeristiwaController extends Controller
{
    public function kelahiran()
    {
        $kelahirans = Kelahiran::paginate(10);
        return view('dashboard.pengelola.peristiwa.kelahiran',compact('kelahirans'));
    }

    public function kelahiranCreate(Request $request)
    {
        $jenisKelamin = JenisKelamin::orderBy('deskripsi','ASC')->get();
        $penduduk   = Penduduk::get();
        $pelapor    = Pelapor::orderBy('deskripsi','ASC')->get();
        $perangkatDesa = Perangkat::where('id','1')->first();
        $jabatan        = Jabatan::where('deskripsi','Kepala Desa')->first();
        return view('dashboard.pengelola.peristiwa.kelahiran-create',[
            'penduduk'          => $penduduk,
            'jenisKelamin'      => $jenisKelamin,
            'pelapor'           => $pelapor,
            'perangkatDesa'     => $perangkatDesa,
            'jabatan'           => $jabatan
        ]);
    }

    public function getKelahiran(Request $request)
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

    public function kelahiranStore(Request $request)
    {
        $kelahirans = Kelahiran::create([
            'nama_bayi'         => $request->nama_bayi,
            'id_jenis_kelamin'  => $request->id_jenis_kelamin,
            'tgl_kelahiran'     => $request->tgl_kelahiran,
            'berat_bayi'        => $request->berat_bayi,
            'panjang_bayi'      => $request->panjang_bayi,
            'is_kembar'         => $request->is_kembar,
            'nama_ayah'         => $request->nama_ayah,
            'id_keluarga'       => $request->id_keluarga,
            'nama_ibu'          => $request->nama_ibu,
            'lokasi_lahir'      => $request->lokasi_lahir,
            'tempat_lahir'      => $request->tempat_lahir,
            'penolong'          => $request->penolong,
            'nama_pelapor'      => $request->nama_pelapor,
            'id_pelapor'        => $request->id_pelapor,
            'id_surat'          => $request->id_surat,
            ]);
        return redirect()->route('dashboard.pengelola.peristiwa.kelahiran')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function kelahiranEdit(Request $request, $id)
    {
        $jenisKelamin       = JenisKelamin::orderBy('deskripsi','ASC')->get();
        $penduduk           = Penduduk::get();
        $pelapor            = Pelapor::orderBy('deskripsi','ASC')->get();
        $jabatan            = Jabatan::where('deskripsi','Kepala Desa')->first();
        $kelahirans         = Kelahiran::where('id',$id)->first();
        $penduduks          = Penduduk::where('id','3')->first();
        return view('dashboard.pengelola.peristiwa.edit-kelahiran',[
            'penduduk'          => $penduduk,
            'jenisKelamin'      => $jenisKelamin,
            'pelapor'           => $pelapor,
            'jabatan'           => $jabatan,
            'kelahirans'        => $kelahirans,
            'penduduks'         => $penduduks
        ]);
    }

    public function kelahiranUpdate(Request $request,$id)
    {
        $kelahirans = Kelahiran::where('id',$id)->update([
            'nama_bayi'         => $request->nama_bayi,
            'id_jenis_kelamin'  => $request->id_jenis_kelamin,
            'tgl_kelahiran'     => $request->tgl_kelahiran,
            'berat_bayi'        => $request->berat_bayi,
            'panjang_bayi'      => $request->panjang_bayi,
            'id_keluarga'       => $request->id_keluarga,
            'is_kembar'         => $request->is_kembar,
            'nama_ayah'         => $request->nama_ayah,
            'nama_ibu'          => $request->nama_ibu,
            'lokasi_lahir'      => $request->lokasi_lahir,
            'tempat_lahir'      => $request->tempat_lahir,
            'penolong'          => $request->penolong,
            'nama_pelapor'      => $request->nama_pelapor,
            'id_pelapor'        => $request->id_pelapor,
            'id_surat'          => $request->id_surat
            ]);
        return redirect()->route('dashboard.pengelola.peristiwa.kelahiran')->with('sukses', 'Data berhasil diupdate!');
    }

    public function kelahiranDelete($id)
    {
        $kelahirans = Kelahiran::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.peristiwa.kelahiran')->with('sukses', 'Data berhasil dihapus!');
    }

    public function kematian()
    {
        $meninggals = Meninggal::paginate(10);
        return view('dashboard.pengelola.peristiwa.kematian',compact('meninggals'));
    }

    public function kematianCreate(Request $request)
    {
        
        $penduduks = Penduduk::where('id','4')->first();
        $pelapor    = Pelapor::orderBy('deskripsi','ASC')->get();
        $jenisKelamin = JenisKelamin::orderBy('deskripsi','ASC')->get();
        $penduduk = Penduduk::get();
        $perangkatDesa = Perangkat::where('id','1')->first();
        $jabatan        = Jabatan::where('deskripsi','Kepala Desa')->first();
        return view('dashboard.pengelola.peristiwa.kematian-create',[
            'penduduk'          => $penduduk,
            'jenisKelamin'      => $jenisKelamin,
            'pelapor'           => $pelapor,
            'perangkatDesa'     => $perangkatDesa,
            'jabatan'           => $jabatan,
        ]);
    }

    public function kematianStore(Request $request)
    {
        $kematians = Meninggal::create([
            'tgl_meninggal'     => $request->tgl_meninggal,
            'nama'              => $request->nama,
            'sebab'             => $request->sebab,
            'id_penduduk'       => $request->id_penduduk,
            'penentu_kematian'  => $request->penentu_kematian,
            'tempat_kematian'   => $request->tempat_kematian,
            'id_pelapor'        => $request->id_pelapor,
            'nama_pelapor'      => $request->nama_pelapor,
            'id_surat'          => $request->id_surat,
            ]);
        return redirect()->route('dashboard.pengelola.peristiwa.kematian')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function kematianEdit(Request $request, $id)
    {
        $penduduks = Penduduk::where('id','3')->first();
        $pelapor   = Pelapor::orderBy('deskripsi','ASC')->get();
        $kematians = Meninggal::where('id',$id)->first();
        return view('dashboard.pengelola.peristiwa.edit-kematian',[
            'penduduks'          => $penduduks,
            'pelapor'           => $pelapor,
            'kematians'         => $kematians,
        ]);
    }

    public function kematianUpdate(Request $request, $id)
    {
        $kematians = Meninggal::where('id',$id)->update([
            'tgl_meninggal'     => $request->tgl_meninggal,
            'nama'              => $request->nama,
            'sebab'             => $request->sebab,
            'id_penduduk'       => $request->id_penduduk,
            'penentu_kematian'  => $request->penentu_kematian,
            'tempat_kematian'   => $request->tempat_kematian,
            'id_pelapor'        => $request->id_pelapor,
            'nama_pelapor'      => $request->nama_pelapor,
            'id_surat'          => $request->id_surat,
        ]);
        return redirect()->route('dashboard.pengelola.peristiwa.kematian')->with('sukses', 'Data berhasil diupdate!');
    }

    public function kematianDelete($id)
    {
        $kematians = Meninggal::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.peristiwa.kematian')->with('sukses', 'Data berhasil dihapus!');
    }

    public function masuk()
    {
        $pindahMasuk = PindahMasuk::paginate(10);
        return view('dashboard.pengelola.peristiwa.pindah-masuk',compact('pindahMasuk'));
    }
}
