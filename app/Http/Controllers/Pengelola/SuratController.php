<?php

namespace App\Http\Controllers\Pengelola;


use App\Jabatan;
use App\Http\Controllers\Controller;
use App\KodeSurat;
use App\Perangkat;
use PDF;
use App\Penduduk;
use App\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        $surats        = Surat::paginate(10);
        return view('dashboard.pengelola.surat.index',compact('surats'));
    }

    public function getSurat(Request $request)
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

    public function create(Request $request)
    {
        $kodeSurat      = KodeSurat::get();
        $perangkatDesa  = Perangkat::where('id','1')->first();
        $jabatan        = Jabatan::where('deskripsi','Kepala Desa')->first();
        return view('dashboard.pengelola.surat.surat-create',[
            'perangkatDesa'         => $perangkatDesa,
            'jabatan'               => $jabatan,
            'kodeSurat'             => $kodeSurat
        ]);
    }

    public function store(Request $request)
    {
        $surats = Surat::create([
            'nomor_surat'       => $request->nomor_surat,
            'kode_surat'        => $request->kode_surat,
            'tanggal_surat'     => $request->tanggal_surat,
            'tanggal_awal'      => $request->tanggal_awal,
            'nomor_registrasi'  => $request->nomor_registrasi,
            'tanggal_akhir'     => $request->tanggal_akhir,
            'judul_surat'       => $request->judul_surat,
            'keterangan'        => $request->keterangan,
            'kata_penutup'      => $request->kata_penutup,
            'id_perangkat'      => $request->id_perangkat,
            'id_penduduk'       => $request->id_penduduk
        ]);

        return redirect()->route('dashboard.pengelola.surat.index')->with('sukses','Data Berhasil Ditambahkan!');
    }

    public function cetakPdf(Request $request, $id)
    {
        $surats = Surat::where('id',$id)->first();

        $pdf    = PDF::loadview('dashboard.pengelola.surat.cetak-pdf',[
            'surats'        => $surats
        ]);
        return $pdf->stream();
    }

}
