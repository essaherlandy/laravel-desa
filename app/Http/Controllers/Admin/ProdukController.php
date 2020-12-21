<?php

namespace App\Http\Controllers\Admin;

use App\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::paginate(5);
        return view('dashboard.admin.produk-olahan',compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'harga' => preg_replace('/[^0-9]/', '', $request->harga)
        ]);

        $path = public_path().'/produk';
        $pathDB = '/produk/';
        $fileName = NULL;

        if($request->gambar){
            $file       = $request->gambar;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $produks = Produk::create([
                'judul_produk'  => $request->judul_produk,
                'gambar'        => $fileName,
                'harga'         => $request->harga,
                'deskripsi'     => $request->deskripsi
            ]);
        }
        return redirect()->route('dashboard.admin.produk-olahan')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks = Produk::where('id',$id)->first();
        return view('dashboard.admin.edit-produk-olahan',['produks' => $produks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->merge([
            'harga' => preg_replace('/[^0-9]/', '', $request->harga)
        ]);

        $path = public_path().'/produk';
        $pathDB = '/produk/';
        $fileName = NULL;

        if($request->gambar){
            $file       = $request->gambar;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $produks = Produk::where('id',$id)->update([
                'judul_produk'  => $request->judul_produk,
                'gambar'        => $fileName,
                'harga'         => $request->harga,
                'deskripsi'     => $request->deskripsi
            ]);
        }
        return redirect()->route('dashboard.admin.produk-olahan')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $produks = Produk::where('id',$id)->delete();

        return redirect()->route('dashboard.admin.produk-olahan')->with('sukses', 'Data berhasil dihapus');
    }
}
