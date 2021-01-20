<?php

namespace App\Http\Controllers\Pengelola;

use App\Agama;
use App\Difabilitas;
use App\Dusun;
use App\RW;
use App\RT;
use App\Golongandarah;
use App\HubunganKeluarga;
use App\Keluarga;
use App\Kompetensi;
use App\Kontrasepsi;
use App\Ksosial;
use App\Http\Controllers\Controller;
use App\Pekerjaan;
use App\Pendidikan;
use App\Penduduk;
use App\Pekerjaanpenduduk;
use App\StatusKeluarga;
use App\Kewarganegaraan;
use App\StatusKawin;
use App\StatusPenduduk;
use App\StatusTinggal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KependudukanController extends Controller
{
    public function keluarga()
    {   
        $penduduks = Penduduk::paginate(10);
        return view('dashboard.pengelola.data-keluarga',compact('penduduks'));
    }

    public function keluargaCreate()
    {   
        $dusun              = Dusun::pluck("nama_dusun","id");
        $kelasSosial        = Ksosial::get();
        $agama              = Agama::get();
        $golonganDarah      = Golongandarah::get();
        $pendidikans        = Pendidikan::get();
        $pekerjaans         = Pekerjaan::get();
        $pekerjaanPends     = Pekerjaanpenduduk::get();
        $kompetensi         = Kompetensi::get();
        $statusKawins       = StatusKawin::get();
        $statusPenduduks    = StatusPenduduk::get();
        $statusTinggals     = StatusTinggal::get();
        $difabilitas        = Difabilitas::get();
        $kontrasepsi        = Kontrasepsi::get();
        $kewarganegaraan    = Kewarganegaraan::get();
        $statusKeluarga     = StatusKeluarga::where('deskripsi','Kepala Keluarga')->first();
        return view('dashboard.pengelola.keluarga-create',[
            'kelasSosial'       => $kelasSosial,
            'agama'             => $agama,
            'golonganDarah'     => $golonganDarah,
            'pendidikans'       => $pendidikans,
            'pekerjaans'        => $pekerjaans,
            'pekerjaanPends'    => $pekerjaanPends,
            'kompetensi'        => $kompetensi,
            'statusKawins'      => $statusKawins,
            'statusPenduduks'   => $statusPenduduks,
            'statusTinggals'    => $statusTinggals,
            'difabilitas'       => $difabilitas,
            'kontrasepsi'       => $kontrasepsi,
            'kewarganegaraan'   => $kewarganegaraan,
            'dusun'             => $dusun,
            'statusKeluarga'    => $statusKeluarga
        ]);
    }
    public function getRWList(Request $request)
    {
        $rw = RW::where("id_dusun",$request->id_dusun)
        ->pluck("nomor_rw","id");
        return response()->json($rw);
    }

    public function getRTList(Request $request)
    {
        $rt = RT::where("id_rw",$request->id_rw)
        ->pluck("nomor_rt","id");
        return response()->json($rt);
    }

    public function keluargaStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'no_kk'                 => 'required|numeric|min:16',
            'id_kelas_sosial'       => 'required',
            'nik'                   => 'required|numeric|min:16',
            'nama'                  => 'required',
            'tempat_lahir'          => 'required',
            'is_sementara'          => 'required',
            'id_rt'                 => 'required',
            'id_rw'                 => 'required',
            'id_dusun'              => 'required',
            'id_pendidikan'         => 'required',
            'id_agama'              => 'required',
            'id_goldar'             => 'required',
            'id_pendidikan_terakhir'=> 'required',
            'id_jenis_kelamin'      => 'required',
            'id_kewarganegaraan'    => 'required',
            'id_pekerjaan'          => 'required',
            'id_pekerjaan_penduduk' => 'required',
            'id_status_kawin'       => 'required',
            'id_status_penduduk'    => 'required',
            'id_status_tinggal'     => 'required',
            'id_difabilitas'        => 'required',
            'id_kontrasepsi'        => 'required',
            'nama_ayah'             => 'required',
            'nama_ibu'              => 'required',
        ],[
            'no_kk.required'                    => 'Masukan nomor KK terlebih dahulu',
            'alamat.required'                   => 'Masukan alamat terlebih dahulu',
            'id_kelas_sosial.required'          => 'Silahkan pilih kelas sosial terlebih dahulu',
            'no_kk.min'                         => 'Nomor KK Minimal 16 Karakter',
            'nik.required'                      => 'Masukan nik terlebih dahulu',
            'nama.required'                     => 'Masukan nama terlebih dahulu',
            'tempat_lahir.required'             => 'Masukan tempat lahir terlebih dahulu',
            'nik.min'                           => 'NIK Minimal 16 Karakter',
            'nik.max'                           => 'NIK Maximal 16 Karakter',
            'is_sementara.required'             => 'Silahkan pilih status penduduk terlebih dahulu',
            'id_rt.required'                    => 'Silahkan pilih rt terlebih dahulu',
            'id_rw.required'                    => 'Silahkan pilih rw terlebih dahulu',
            'id_dusun.required'                 => 'Silahkan pilih dusun terlebih dahulu',
            'id_pendidikan.required'            => 'Silahkan pilih pendidikan terlebih dahulu',
            'id_agama.required'                 => 'Silahkan pilih agama terlebih dahulu',
            'id_goldar.required'                => 'Silahkan pilih golongan darah terlebih dahulu',
            'id_pendidikan_terakhir.required'   => 'Silahkan pilih pendidikan terakhir terlebih dahulu',
            'id_jenis_kelamin.required'         => 'Silahkan pilih jenis kelamin terlebih dahulu',
            'id_kewarganegaraan.required'       => 'Silahkan pilih kewarganegaraan terlebih dahulu',
            'id_pekerjaan.required'             => 'Silahkan pilih pekerjaan terlebih dahulu',
            'id_status_kawin.required'          => 'Silahkan pilih status kawin terlebih dahulu',
            'id_status_penduduk.required'       => 'Silahkan pilih status penduduk terlebih dahulu',
            'id_status_tinggal.required'        => 'Silahkan pilih status tinggal terlebih dahulu',
            'id_difabilitas.required'           => 'Silahkan pilih kondisi difabilitas terlebih dahulu',
            'id_kontrasepsi.required'           => 'Silahkan pilih kontrasepsi terlebih dahulu',
            'nama_ayah.required'                => 'Masukan nama ayah terlebih dahulu',
            'nama_ibu.required'                 => 'Masukan nama ibu terlebih dahulu',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $path = public_path().'/keluarga';
        $pathDB = '/keluarga/';
        $fileName = NULL;

        if($request->foto){
            $file       = $request->foto;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);
            
            $penduduk = Penduduk::create([
                'nik'                       => $request->nik,
                'nama'                      => $request->nama,
                'tempat_lahir'              => $request->tempat_lahir,
                'tgl_lahir'                 => $request->tgl_lahir,
                'foto'                      => $fileName,
                'no_telp'                   => $request->no_telp,
                'email'                     => $request->email,
                'no_kitas'                  => $request->no_kitas,
                'no_paspor'                 => $request->no_paspor,
                'is_sementara'              => $request->is_sementara,
                'id_rt'                     => $request->id_rt,
                'id_rw'                     => $request->id_rw,
                'id_dusun'                  => $request->id_dusun,
                'id_pendidikan'             => $request->id_pendidikan,
                'is_bsm'                    => $request->is_bsm,
                'id_agama'                  => $request->id_agama,
                'id_goldar'                 => $request->id_goldar,
                'id_pendidikan_terakhir'    => $request->id_pendidikan_terakhir,
                'id_jenis_kelamin'          => $request->id_jenis_kelamin,
                'id_kewarganegaraan'        => $request->id_kewarganegaraan,
                'id_pekerjaan'              => $request->id_pekerjaan,
                'id_pekerjaan_penduduk'     => $request->id_pekerjaan_penduduk,
                'id_kompetensi'             => $request->id_kompetensi,
                'id_status_kawin'           => $request->id_status_kawin,
                'id_status_penduduk'        => $request->id_status_penduduk,
                'id_status_tinggal'         => $request->id_status_tinggal,
                'id_difabilitas'            => $request->id_difabilitas,
                'id_kontrasepsi'            => $request->id_kontrasepsi,
            ]);
        }
        $keluarga = Keluarga::create([
            'id_penduduk'               => $penduduk->id,
            'no_kk'                     => $request->no_kk,
            'alamat_jalan'              => $request->alamat_jalan,
            'is_sementara'              => $request->is_sementara,
            'is_raskin'                 => $request->is_raskin,
            'is_jamkesmas'              => $request->is_jamkesmas,
            'is_pkh'                    => $request->is_pkh,
            'id_kelas_sosial'           => $request->id_kelas_sosial,
            'id_kepala_keluarga'        => $penduduk->id,
            'id_rt'                     => $request->id_rt,
            'id_rw'                     => $request->id_rw,
            'id_dusun'                  => $request->id_dusun,
        ]);
        
        $hubunganKeluarga = HubunganKeluarga::create([
            'id_penduduk'               => $penduduk->id,
            'id_keluarga'               => $keluarga->id,
            'id_status_keluarga'        => $request->id_status_keluarga,
            'nama_ayah'                 => $request->nama_ayah,
            'nama_ibu'                  => $request->nama_ibu,
        ]);
        return redirect()->route('dashboard.pengelola.data-keluarga')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function keluargaEdit(Request $request, $id)
    {
        $penduduk           = Penduduk::where('id',$id)->first();
        $keluarga           = Keluarga::where('id_penduduk',$id)->first();
        $hubunganKeluarga   = HubunganKeluarga::where('id_penduduk',$id)->first();
        $dusun              = Dusun::pluck("nama_dusun","id");
        $kelasSosial        = Ksosial::get();
        $agama              = Agama::get();
        $golonganDarah      = Golongandarah::get();
        $pendidikans        = Pendidikan::get();
        $pekerjaans         = Pekerjaan::get();
        $pekerjaanPends     = Pekerjaanpenduduk::get();
        $kompetensi         = Kompetensi::get();
        $statusKawins       = StatusKawin::get();
        $statusPenduduks    = StatusPenduduk::get();
        $statusTinggals     = StatusTinggal::get();
        $difabilitas        = Difabilitas::get();
        $kontrasepsi        = Kontrasepsi::get();
        $kewarganegaraan    = Kewarganegaraan::get();
        $statusKeluarga     = StatusKeluarga::where('deskripsi','Kepala Keluarga')->first();

        return view('dashboard.pengelola.edit-keluarga',[
            'penduduk'              => $penduduk,
            'keluarga'              => $keluarga,
            'hubunganKeluarga'      => $hubunganKeluarga,
            'kelasSosial'           => $kelasSosial,
            'agama'                 => $agama,
            'golonganDarah'         => $golonganDarah,
            'pendidikans'           => $pendidikans,
            'pekerjaans'            => $pekerjaans,
            'pekerjaanPends'        => $pekerjaanPends,
            'kompetensi'            => $kompetensi,
            'statusKawins'          => $statusKawins,
            'statusPenduduks'       => $statusPenduduks,
            'statusTinggals'        => $statusTinggals,
            'difabilitas'           => $difabilitas,
            'kontrasepsi'           => $kontrasepsi,
            'kewarganegaraan'       => $kewarganegaraan,
            'dusun'                 => $dusun,
            'statusKeluarga'        => $statusKeluarga
        ]);
    }

    public function keluargaUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'no_kk'                 => 'required|numeric|min:16',
            'id_kelas_sosial'       => 'required',
            'nik'                   => 'required|numeric|min:16',
            'nama'                  => 'required',
            'tempat_lahir'          => 'required',
            'tgl_lahir'             => 'required',
            'no_telp'               => 'required',
            'email'                 => 'required',
            'is_sementara'          => 'required',
            'id_rt'                 => 'required',
            'id_rw'                 => 'required',
            'id_dusun'              => 'required',
            'id_pendidikan'         => 'required',
            'id_agama'              => 'required',
            'id_goldar'             => 'required',
            'id_pendidikan_terakhir'=> 'required',
            'id_jenis_kelamin'      => 'required',
            'id_kewarganegaraan'    => 'required',
            'id_pekerjaan'          => 'required',
            'id_pekerjaan_penduduk' => 'required',
            'id_status_kawin'       => 'required',
            'id_status_penduduk'    => 'required',
            'id_status_tinggal'     => 'required',
            'id_difabilitas'        => 'required',
            'id_kontrasepsi'        => 'required',
            'nama_ayah'             => 'required',
            'nama_ibu'              => 'required',
        ],[
            'no_kk.required'                    => 'Masukan nomor KK terlebih dahulu',
            'alamat.required'                   => 'Masukan alamat terlebih dahulu',
            'id_kelas_sosial.required'          => 'Silahkan pilih kelas sosial terlebih dahulu',
            'no_kk.min'                         => 'Nomor KK Minimal 16 Karakter',
            'nik.required'                      => 'Masukan nik terlebih dahulu',
            'nama.required'                     => 'Masukan nama terlebih dahulu',
            'tempat_lahir.required'             => 'Masukan tempat lahir terlebih dahulu',
            'tgl_lahir.required'                => 'Silahkan pilih tanggal terlebih dahulu',
            'nik.min'                           => 'NIK Minimal 16 Karakter',
            'nik.max'                           => 'NIK Maximal 16 Karakter',
            'no_telp.required'                  => 'Silahkan masukan nomor telepon terlebih dahulu',
            'email.required'                    => 'Silahkan masukan email terlebih dahulu',
            'is_sementara.required'             => 'Silahkan pilih status penduduk terlebih dahulu',
            'id_rt.required'                    => 'Silahkan pilih rt terlebih dahulu',
            'id_rw.required'                    => 'Silahkan pilih rw terlebih dahulu',
            'id_dusun.required'                 => 'Silahkan pilih dusun terlebih dahulu',
            'id_pendidikan.required'            => 'Silahkan pilih pendidikan terlebih dahulu',
            'id_agama.required'                 => 'Silahkan pilih agama terlebih dahulu',
            'id_goldar.required'                => 'Silahkan pilih golongan darah terlebih dahulu',
            'id_pendidikan_terakhir.required'   => 'Silahkan pilih pendidikan terakhir terlebih dahulu',
            'id_jenis_kelamin.required'         => 'Silahkan pilih jenis kelamin terlebih dahulu',
            'id_kewarganegaraan.required'       => 'Silahkan pilih kewarganegaraan terlebih dahulu',
            'id_pekerjaan.required'             => 'Silahkan pilih pekerjaan terlebih dahulu',
            'id_status_kawin.required'          => 'Silahkan pilih status kawin terlebih dahulu',
            'id_status_penduduk.required'       => 'Silahkan pilih status penduduk terlebih dahulu',
            'id_status_tinggal.required'        => 'Silahkan pilih status tinggal terlebih dahulu',
            'id_difabilitas.required'           => 'Silahkan pilih kondisi difabilitas terlebih dahulu',
            'id_kontrasepsi.required'           => 'Silahkan pilih kontrasepsi terlebih dahulu',
            'nama_ayah.required'                => 'Masukan nama ayah terlebih dahulu',
            'nama_ibu.required'                 => 'Masukan nama ibu terlebih dahulu',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $path = public_path().'/keluarga';
        $pathDB = '/keluarga/';
        $fileName = NULL;

        if($request->foto){
            $file       = $request->foto;
            $extension  = $file->extension();
            $fileName   = $pathDB.strtotime(date('Y-m-d H:i:s')).Str::random(5).'.'.$extension;
        
            $file->move($path, $fileName);
            
            $penduduk = Penduduk::where('id',$id)->update([
                'nik'                       => $request->nik,
                'nama'                      => $request->nama,
                'tempat_lahir'              => $request->tempat_lahir,
                'tgl_lahir'                 => $request->tgl_lahir,
                'foto'                      => $fileName,
                'no_telp'                   => $request->no_telp,
                'email'                     => $request->email,
                'no_kitas'                  => $request->no_kitas,
                'no_paspor'                 => $request->no_paspor,
                'is_sementara'              => $request->is_sementara,
                'id_rt'                     => $request->id_rt,
                'id_rw'                     => $request->id_rw,
                'id_dusun'                  => $request->id_dusun,
                'id_pendidikan'             => $request->id_pendidikan,
                'is_bsm'                    => $request->is_bsm,
                'id_agama'                  => $request->id_agama,
                'id_goldar'                 => $request->id_goldar,
                'id_pendidikan_terakhir'    => $request->id_pendidikan_terakhir,
                'id_jenis_kelamin'          => $request->id_jenis_kelamin,
                'id_kewarganegaraan'        => $request->id_kewarganegaraan,
                'id_pekerjaan'              => $request->id_pekerjaan,
                'id_pekerjaan_penduduk'     => $request->id_pekerjaan_penduduk,
                'id_kompetensi'             => $request->id_kompetensi,
                'id_status_kawin'           => $request->id_status_kawin,
                'id_status_penduduk'        => $request->id_status_penduduk,
                'id_status_tinggal'         => $request->id_status_tinggal,
                'id_difabilitas'            => $request->id_difabilitas,
                'id_kontrasepsi'            => $request->id_kontrasepsi,
            ]);
        }
        $keluarga = Keluarga::where('id_kepala_keluarga',$id)->update([
            'no_kk'                     => $request->no_kk,
            'alamat_jalan'              => $request->alamat_jalan,
            'is_sementara'              => $request->is_sementara,
            'is_raskin'                 => $request->is_raskin,
            'is_jamkesmas'              => $request->is_jamkesmas,
            'is_pkh'                    => $request->is_pkh,
            'id_kelas_sosial'           => $request->id_kelas_sosial,
            'id_rt'                     => $request->id_rt,
            'id_rw'                     => $request->id_rw,
            'id_dusun'                  => $request->id_dusun,
        ]);
        
        $hubunganKeluarga = HubunganKeluarga::where('id_keluarga',$id)->update([
            'id_status_keluarga'        => $request->id_status_keluarga,
            'nama_ayah'                 => $request->nama_ayah,
            'nama_ibu'                  => $request->nama_ibu,
        ]);
        return redirect()->route('dashboard.pengelola.data-keluarga')->with('sukses', 'Data berhasil diupdate!');
    }

    public function pisahKeluarga()
    {
        $pisahKeluargas = Keluarga::paginate(10);
        return view('dashboard.pengelola.pisah-keluarga',compact('pisahKeluargas'));
    }
}
