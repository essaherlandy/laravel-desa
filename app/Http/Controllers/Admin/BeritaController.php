<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $beritas = Berita::paginate(5);
        return view('dashboard.admin.berita',compact('beritas','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = public_path().'/berita';
        $pathDB = '/berita/';
        $fileName = NULL;

        if($request->gambar){
            $file       = $request->gambar;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $beritas = Berita::create([
                'id_pengguna'   => $request->id_pengguna,
                'gambar'        => $fileName,
                'judul_berita'  => $request->judul_berita,
                'isi_berita'    => $request->isi_berita
            ]);
        }
        return redirect()->route('dashboard.admin.berita')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = public_path().'/berita';
        $pathDB = '/berita/';
        $fileName = NULL;

        if($request->gambar){
            $file       = $request->gambar;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);
            
            $beritas = Berita::where('id',$id)->update([
                'id_pengguna'   => $request->id_pengguna,
                'gambar'        => $fileName,
                'judul_berita'  => $request->judul_berita,
                'isi_berita'    => $request->isi_berita
            ]);
        }
        return redirect()->route('dashboard.admin.berita')->with('sukses', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
