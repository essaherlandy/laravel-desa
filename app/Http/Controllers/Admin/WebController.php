<?php

namespace App\Http\Controllers\Admin;

use App\Logo;
use App\SliderBeranda;
use App\SliderLogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebController extends Controller
{
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
    
    public function sliderBeranda()
    {
        $sliderBerandas = SliderBeranda::paginate(5);
        return view('dashboard.admin.slider-beranda',compact('sliderBerandas'));
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

    public function sliderDelete($id)
    {
        $sliderBeranda = SliderBeranda::where('id',$id)->delete();
        $sliderLogos = SliderLogo::where('slider_id',$id)->delete();

        return redirect()->route('dashboard.admin.slider-beranda')->with('sukses', 'Data berhasil dihapus');
    }
}
