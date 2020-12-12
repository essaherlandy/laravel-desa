<?php

namespace App\Http\Controllers\Admin;

use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $kegiatans = Kegiatan::paginate(5);
        return view('dashboard.admin.kegiatan',compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'nilai_kegiatan' => preg_replace('/[^0-9]/', '', $request->nilai_kegiatan)
        ]);

        $path = public_path().'/kegiatan';
        $pathDB = '/kegiatan/';
        $fileName = NULL;

        if($request->gambar){
            $file       = $request->gambar;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;

            $file->move($path, $fileName);

            $kegiatans = Kegiatan::create([
                'pelaksana'         => $request->pelaksana,
                'gambar'            => $fileName,
                'deskripsi'         => $request->deskripsi,
                'nilai_kegiatan'    => $request->nilai_kegiatan,
            ]);
        }
        return redirect()->route('dashboard.admin.kegiatan')->with('sukses', 'Data berhasil disimpan');
    }

    public function edit(Request $request,$id)
    {
        $kegiatans = Kegiatan::where('id',$id)->first();
        return view('dashboard.admin.edit-kegiatan',['kegiatans' => $kegiatans]);
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'nilai_kegiatan' => preg_replace('/[^0-9]/', '', $request->nilai_kegiatan)
        ]);

        $path = public_path().'/kegiatan';
        $pathDB = '/kegiatan/';
        $fileName = NULL;

        if($request->gambar){
            $file       = $request->gambar;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);
            
            $kegiatans = Kegiatan::where('id',$id)->update([
                'pelaksana'     => $request->pelaksana,
                'gambar'        => $fileName,
                'deskripsi'  => $request->deskripsi,
                'nilai_kegiatan'    => $request->nilai_kegiatan
            ]);
        }
        return redirect()->route('dashboard.admin.kegiatan')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $kegiatans = Kegiatan::where('id',$id)->delete();

        return redirect()->route('dashboard.admin.kegiatan')->with('sukses', 'Data berhasil dihapus');
    }
}
