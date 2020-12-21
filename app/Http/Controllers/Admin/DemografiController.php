<?php

namespace App\Http\Controllers\Admin;

use App\Demografi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DemografiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demografis = Demografi::paginate(10);
        return view('dashboard.admin.demografi-desa',compact('demografis'));
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

        $path = public_path().'/demografi';
        $pathDB = '/demografi/';
        $fileName = NULL;

        if($request->foto_banner){
            $file       = $request->foto_banner;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;

            $file->move($path, $fileName);

            $demografis = Demografi::create([
                'id_pengguna'         => $request->id_pengguna,
                'foto_banner'         => $fileName,
                'isi_demografi'       => $request->isi_demografi,
            ]);
        }
        return redirect()->route('dashboard.admin.demografi-desa')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demografi  $demografi
     * @return \Illuminate\Http\Response
     */
    public function show(Demografi $demografi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demografi  $demografi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $demografis = Demografi::where('id',$id)->first();
        return view('dashboard.admin.edit-demografi',['demografis' => $demografis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demografi  $demografi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = public_path().'/demografi';
        $pathDB = '/demografi/';
        $fileName = NULL;

        if($request->foto_banner){
            $file       = $request->foto_banner;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;

            $file->move($path, $fileName);

            $demografis = Demografi::where('id',$id)->update([
                'id_pengguna'         => $request->id_pengguna,
                'foto_banner'         => $fileName,
                'isi_demografi'       => $request->isi_demografi,
            ]);
        }
        return redirect()->route('dashboard.admin.demografi-desa')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demografi  $demografi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demografi $demografi)
    {
        //
    }
}
