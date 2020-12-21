<?php

namespace App\Http\Controllers\Admin;

use App\Logo;
use App\Sejarah;
use App\Visimisi;
use App\SliderBeranda;
use App\SliderLogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebController extends Controller
{
    /* Beranda */
    public function logo()
    {
        $logos = Logo::paginate(5);
        return view('dashboard.admin.logo',compact('logos'));
    }

    public function logoUpdate(Request $request,$id)
    {
        $path = public_path().'/logo';
        $pathDB = '/logo/';
        $fileName = NULL;

        if($request->konten_logo_desa){
            $file       = $request->konten_logo_desa;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;

            $file->move($path, $fileName);

            $logos = Logo::where('id',$id)->update([
                'konten_logo_desa'    => $fileName,
            ]);
        }
        
        if($request->konten_logo_kabupaten){
            $file       = $request->konten_logo_kabupaten;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;

            $file->move($path, $fileName);

            $logos = Logo::where('id',$id)->update([
                'konten_logo_kabupaten'    => $fileName,
            ]);
        }
        
        return redirect()->route('dashboard.admin.logo')->with('sukses', 'Data berhasil diupdate');
    }
    

    /* Slider Beranda */
    public function sliderBeranda()
    {
        $sliderBerandas = SliderBeranda::paginate(5);
        return view('dashboard.admin.slider-beranda',compact('sliderBerandas'));
    }

    public function edit($id)
    {
        $sliderBerandas = SliderBeranda::where('id',$id)->first();
        return view('dashboard.admin.edit-slider-beranda',['sliderBerandas' => $sliderBerandas]);
    }

    public function sliderStore(Request $request)
    {
        $path = public_path().'/slider';
        $pathDB = '/slider/';
        $fileName = NULL;

        if($request->konten_background){
            $file       = $request->konten_background;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $sliderBerandas = SliderBeranda::create([
                'konten_background'    => $fileName,
                'konten_text'          => $request->konten_text,
            ]);
        }

        $path = public_path().'/slider';
        $pathDB = '/slider/';
        $fileName = NULL;

        if($request->konten_logo){
            $file       = $request->konten_logo;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $sliderLogos = SliderLogo::create([
                'slider_id'             => $sliderBerandas->id,
                'konten_logo'           => $fileName,
            ]);
        }
        
        return redirect()->route('dashboard.admin.slider-beranda')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function sliderUpdate(Request $request,$id)
    {
        $path = public_path().'/slider';
        $pathDB = '/slider/';
        $fileName = NULL;

        if($request->konten_background){
            $file       = $request->konten_background;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $sliderBerandas = SliderBeranda::where('id',$id)->update([
                'konten_background'    => $fileName,
                'konten_text'          => $request->konten_text,
            ]);
        }

        $path = public_path().'/slider';
        $pathDB = '/slider/';
        $fileName = NULL;

        if($request->konten_logo){
            $file       = $request->konten_logo;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $sliderLogos = SliderLogo::where('slider_id',$id)->update([
                'konten_logo'           => $fileName,
            ]);
        }
        
        return redirect()->route('dashboard.admin.slider-beranda')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function sliderDelete($id)
    {
        $sliderBeranda = SliderBeranda::where('id',$id)->delete();
        $sliderLogos = SliderLogo::where('slider_id',$id)->delete();

        return redirect()->route('dashboard.admin.slider-beranda')->with('sukses', 'Data berhasil dihapus');
    }

    public function Sejarah(Request $request)
    {
        $sejarahDesa = Sejarah::paginate(5);
        return view('dashboard.admin.sejarah-desa',compact('sejarahDesa'));
    }

    /* Sejarah */
    public function sejarahStore(Request $request)
    {
        $path = public_path().'/sejarah';
        $pathDB = '/sejarah/';
        $fileName = NULL;

        if($request->foto_banner){
            $file       = $request->foto_banner;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $sejarahDesa = Sejarah::create([
                'foto_banner'           => $fileName,
                'id_pengguna'          => $request->id_pengguna,
                'isi_sejarah'          => $request->isi_sejarah,
            ]);
        }
        return redirect()->route('dashboard.admin.sejarah-desa')->with('sukses', 'Data berhasil disimpan');
    }
    public function editSejarah(Request $request,$id)
    {
        $sejarahDesa = Sejarah::where('id',$id)->first();
        return view('dashboard.admin.edit-sejarah-desa',compact('sejarahDesa'));
    }

    public function updateSejarah(Request $request, $id)
    {
        $path = public_path().'/sejarah';
        $pathDB = '/sejarah/';
        $fileName = NULL;

        if($request->foto_banner){
            $file       = $request->foto_banner;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $sejarahDesa = Sejarah::where('id',$id)->update([
                'foto_banner'           => $fileName,
                'id_pengguna'          => $request->id_pengguna,
                'isi_sejarah'          => $request->isi_sejarah,
            ]);
        }
        return redirect()->route('dashboard.admin.sejarah-desa')->with('sukses', 'Data berhasil diupdate');
    }

    public function deleteSejarah($id)
    {
        $sejarahDesa = Sejarah::where('id',$id)->delete();

        return redirect()->route('dashboard.admin.sejarah-desa')->with('sukses', 'Data berhasil dihapus');
    }

    /* Visi dan Misi */
    public function visiMisi()
    {
        $visiMisis = Visimisi::paginate(5);
        return view('dashboard.admin.visi-misi',compact('visiMisis'));
    }

    public function visiMisistore(Request $request)
    {
        $path = public_path().'/visi-misi';
        $pathDB = '/visi-misi/';
        $fileName = NULL;

        if($request->foto_banner){
            $file       = $request->foto_banner;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $visiMisis = Visimisi::create([
                'foto_banner'           => $fileName,
                'id_pengguna'           => $request->id_pengguna,
                'isi_visi_misi'         => $request->isi_visi_misi,
            ]);
        }
        return redirect()->route('dashboard.admin.visi-misi')->with('sukses', 'Data berhasil disimpan');
    }

    public function visiMisiedit(Request $request, $id)
    {
        $visiMisis = Visimisi::where('id',$id)->first();
        return view('dashboard.admin.edit-visi-misi',['visiMisis' => $visiMisis]);
    }

    public function visiMisiupdate(Request $request, $id)
    {
        $path = public_path().'/visi-misi';
        $pathDB = '/visi-misi/';
        $fileName = NULL;

        if($request->foto_banner){
            $file       = $request->foto_banner;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);

            $visiMisis = Visimisi::where('id',$id)->update([
                'foto_banner'           => $fileName,
                'id_pengguna'          => $request->id_pengguna,
                'isi_visi_misi'          => $request->isi_visi_misi,
            ]);
        }
        return redirect()->route('dashboard.admin.visi-misi')->with('sukses', 'Data berhasil diupdate');
    }

    public function visiMisidelete($id)
    {
        $visiMisis = Visimisi::where('id',$id)->delete();

        return redirect()->route('dashboard.admin.visi-misi')->with('sukses', 'Data berhasil dihapus');
    }
}
