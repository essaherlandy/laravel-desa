<?php

namespace App\Http\Controllers\Pengelola;

use App\Agama;
use App\Golongandarah;
use App\Kewarganegaraan;
use App\Kompetensi;
use App\Pendidikan;
use App\Pekerjaan;
use App\Pekerjaanpenduduk;
use App\StatusPenduduk;
use App\StatusKeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PustakapendudukController extends Controller
{
    /* Pendidikan */
    public function pendidikan()
    {
        $pendidikan = Pendidikan::paginate(10);
        return view('dashboard.pengelola.pendidikan',compact('pendidikan'));
    }

    public function pendidikanStore(Request $request)
    {
        $pendidikan = Pendidikan::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pendidikan')->with('sukses', 'Data berhasil disimpan');
    }

    public function pendidikanUpdate(Request $request,$id)
    {
        $pendidikan = Pendidikan::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pendidikan')->with('sukses', 'Data berhasil diupdate');
    }

    public function pendidikanDelete($id)
    {
        $pendidikan = Pendidikan::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pendidikan')->with('sukses', 'Data berhasil dihapus');
    }
    

    /* Pekerjaan */
    public function pekerjaan()
    {
        $pekerjaan = Pekerjaan::paginate(10);
        return view('dashboard.pengelola.pekerjaan',compact('pekerjaan'));
    }

    public function pekerjaanStore(Request $request)
    {
        $pekerjaan = Pekerjaan::create([
            'deskripsi'             => $request->deskripsi,
            'deskripsi_singkat'     => $request->deskripsi_singkat
        ]);
        return redirect()->route('dashboard.pengelola.pekerjaan')->with('sukses', 'Data berhasil disimpan');
    }

    public function pekerjaanUpdate(Request $request,$id)
    {
        $pekerjaan = Pekerjaan::where('id',$id)->update([
            'deskripsi'             => $request->deskripsi,
            'deskripsi_singkat'     => $request->deskripsi_singkat
        ]);
        return redirect()->route('dashboard.pengelola.pekerjaan')->with('sukses', 'Data berhasil update');
    }

    public function pekerjaanDelete($id)
    {
        $pekerjaan = Pekerjaan::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pekerjaan')->with('sukses', 'Data berhasil dihapus');
    }

    /* Pekerjaan Penduduk */
    public function pekerjaanPenduduk()
    {
        $pekerjaanPenduduk  = Pekerjaanpenduduk::paginate(10);
        return view('dashboard.pengelola.pekerjaan-penduduk',compact('pekerjaanPenduduk'));
    }

    public function pekerjaanpendStore(Request $request)
    {
        $pekerjaanPenduduk  = Pekerjaanpenduduk::create([
            'deskripsi'             => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pekerjaan-penduduk')->with('sukses', 'Data berhasil disimpan');
    }

    public function pekerjaanpendUpdate(Request $request,$id)
    {
        $pekerjaanPenduduk  = Pekerjaanpenduduk::where('id',$id)->update([
            'deskripsi'             => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pekerjaan-penduduk')->with('sukses', 'Data berhasil update');
    }

    public function pekerjaanpendDelete($id)
    {
        $pekerjaanPenduduk = Pekerjaanpenduduk::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pekerjaan-penduduk')->with('sukses', 'Data berhasil dihapus');
    }


    /* Golongan Darah */
    public function golonganDarah()
    {
        $goldars = Golongandarah::paginate(10);
        return view('dashboard.pengelola.golongan-darah',compact('goldars'));
    }

    public function goldarStore(Request $request)
    {
        $goldars = Golongandarah::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.golongan-darah')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function goldarUpdate(Request $request, $id)
    {
        $goldars = Golongandarah::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.golongan-darah')->with('sukses', 'Data berhasil diupdate!');
    }

    public function goldarDelete($id)
    {
        $goldars = Golongandarah::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.golongan-darah')->with('sukses', 'Data berhasil dihapus!');
    }

    /* Agama */

    public function agama()
    {
        $agamas = Agama::paginate(10);
        return view('dashboard.pengelola.agama',compact('agamas'));
    }

    public function agamaStore(Request $request)
    {
        $agamas = Agama::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.agama')->with('sukses', 'Data berhasil disimpan!');
    }

    public function agamaUpdate(Request $request, $id)
    {
        $agamas = Agama::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.agama')->with('sukses', 'Data berhasil diupdate!');
    }

    public function agamaDelete($id)
    {
        $agamas = Agama::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.agama')->with('sukses', 'Data berhasil dihapus!');
    }
    /* Kewarganegaraan */

    public function kewarganegaraan()
    {
        $kewarganegaraans = Kewarganegaraan::paginate(10);
        return view('dashboard.pengelola.kewarganegaraan',compact('kewarganegaraans'));
    }

    public function kewarganegaraanStore(Request $request)
    {
        $kewarganegaraans = Kewarganegaraan::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.kewarganegaraan')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function kewarganegaraanUpdate(Request $request, $id)
    {
        $kewarganegaraans = Kewarganegaraan::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.kewarganegaraan')->with('sukses', 'Data berhasil diupdate!');
    }

    public function kewarganegaraanDelete($id)
    {
        $kewarganegaraans = Kewarganegaraan::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.kewarganegaraan')->with('sukses', 'Data berhasil dihapus!');
    }

    /* Kompetensi */
    public function kompetensi()
    {
        $kompetensis    = Kompetensi::paginate(10);
        return view('dashboard.pengelola.kompetensi',compact('kompetensis'));
    }
    public function kompetensiStore(Request $request)
    {
        $kompetensis = Kompetensi::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.kompetensi')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function kompetensiUpdate(Request $request, $id)
    {
        $kompetensis = Kompetensi::where('id',$id)->update([
            'deskripsi'        => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.kompetensi')->with('sukses', 'Data berhasil diupdate!');
    }

    public function kompetensiDelete($id)
    {
        $kompetensis = Kompetensi::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.kompetensi')->with('sukses', 'Data berhasil dihapus!');
    }

    /* Status Keluarga */
    public function statusKeluarga()
    {
        $statusKeluargas = StatusKeluarga::paginate(10);
        return view('dashboard.pengelola.status-keluarga',compact('statusKeluargas'));
    }
    
    public function statkelStore(Request $request)
    {
        $statusKeluargas = StatusKeluarga::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.status-keluarga')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function statkelUpdate(Request $request, $id)
    {
        $statusKeluargas = StatusKeluarga::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.status-keluarga')->with('sukses', 'Data berhasil diupdate!');
    }

    public function statkelDelete($id)
    {
        $statusKeluargas = StatusKeluarga::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.status-keluarga')->with('sukses', 'Data berhasil dihapus!');
    }

    /* Status Penduduk */
    public function statusPenduduk()
    {
        $statusPenduduks = StatusPenduduk::paginate(10);
        return view('dashboard.pengelola.status-penduduk',compact('statusPenduduks'));
    }

    public function statpendStore(Request $request)
    {
        $statusPenduduks = StatusPenduduk::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.status-penduduk')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function statpendUpdate(Request $request, $id)
    {
        $statusPenduduks = StatusPenduduk::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.status-penduduk')->with('sukses', 'Data berhasil diupdate!');
    }

    public function statpendDelete($id)
    {
        $statusPenduduks = StatusPenduduk::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.status-penduduk')->with('sukses', 'Data berhasil hapus!');
    }
}
