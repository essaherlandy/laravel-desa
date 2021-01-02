<?php

namespace App\Http\Controllers\Pengelola;

use App\AlasanPindah;
use App\Difabilitas;
use App\Jabatan;
use App\JenisPindah;
use App\KlarifikasiPindah;
use App\KodeSurat;
use App\Kontrasepsi;
use App\StatusTinggal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PustakalainnyaController extends Controller
{
    /* Difabilitas */
    public function difabilitas()
    {
        $difabilitass = Difabilitas::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.difabilitas',compact('difabilitass'));
    }

    public function difabilitasStore(Request $request)
    {
        $difabilitass = Difabilitas::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.difabilitas')->with('sukses','Data berhasil ditambahkan!');
    }

    public function difabilitasUpdate(Request $request, $id)
    {
        $difabilitass = Difabilitas::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.difabilitas')->with('sukses','Data berhasil diupdate!');
    }

    public function difabilitasDelete($id)
    {
        $difabilitass = Difabilitas::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.difabilitas')->with('sukses','Data berhasil dihapus!');
    }

    /* Kode Surat */

    public function kodeSurat()
    {
        $kodesurats = KodeSurat::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.kode-surat',compact('kodesurats'));
    }

    public function kdsuratStore(Request $request)
    {
        $kodesurats = KodeSurat::create([
            'deskripsi'     => $request->deskripsi,
            'supra_code'    => $request->supra_code
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.kode-surat')->with('sukses','Data berhasil ditambahkan!');
    }

    public function kdsuratUpdate(Request $request, $id)
    {
        $kodesurats = KodeSurat::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi,
            'supra_code'    => $request->supra_code
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.kode-surat')->with('sukses','Data berhasil diupdate!');
    }

    public function kdsuratDelete($id)
    {
        $kodesurats = KodeSurat::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.kode-surat')->with('sukses','Data berhasil dihapus!');
    }

    /* Kontrasepsi */

    public function kontrasepsi()
    {
        $kontrasepsis = Kontrasepsi::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.kontrasepsi',compact('kontrasepsis'));
    }

    public function kontrasepsiStore(Request $request)
    {
        $kontrasepsis = Kontrasepsi::create([
            'deskripsi'         => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.kontrasepsi')->with('sukses','Data berhasil ditambahkan!');
    }

    public function kontrasepsiUpdate(Request $request, $id)
    {
        $kontrasepsis = Kontrasepsi::where('id',$id)->update([
            'deskripsi'         => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.kontrasepsi')->with('sukses','Data berhasil diupdate!');
    }

    public function kontrasepsiDelete($id)
    {
        $kontrasepsis = Kontrasepsi::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.kontrasepsi')->with('sukses','Data berhasil dihapus!');
    }

    /* Status Tinggal */
    public function statusTinggal()
    {
        $statusTinggals = StatusTinggal::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.status-tinggal',compact('statusTinggals'));
    }

    public function tinggalStore(Request $request)
    {
        $statusTinggals = StatusTinggal::create([
            'deskripsi'      => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.status-tinggal')->with('sukses','Data berhasil ditambahkan!');
    }

    public function tinggalUpdate(Request $request, $id)
    {
        $statusTinggals = StatusTinggal::where('id',$id)->update([
            'deskripsi'      => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.status-tinggal')->with('sukses','Data berhasil diupdate!');
    }

    public function tinggalDelete($id)
    {
        $statusTinggals = StatusTinggal::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.status-tinggal')->with('sukses','Data berhasil dihapus!');
    }

    /* Alasan Pindah */

    public function alasanPindah()
    {
        $alasanPindah = AlasanPindah::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.alasan-pindah',compact('alasanPindah'));
    }

    public function alasanStore(Request $request)
    {
        $alasanPindah = AlasanPindah::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.alasan-pindah')->with('sukses','Data berhasil ditambahkan!');
    }

    public function alasanUpdate(Request $request, $id)
    {
        $alasanPindah = AlasanPindah::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.alasan-pindah')->with('sukses','Data berhasil diupdate!');
    }

    public function alasanDelete($id)
    {
        $alasanPindah = AlasanPindah::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.alasan-pindah')->with('sukses','Data berhasil dihapus!');
    }

    /* Jenis Pindah */

    public function jenisPindah()
    {
        $jenisPindah  = JenisPindah::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.jenis-pindah',compact('jenisPindah'));
    }

    public function jenisStore(Request $request)
    {
        $jenisPindah = JenisPindah::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.jenis-pindah')->with('sukses','Data berhasil ditambahkan!');
    }

    public function jenisUpdate(Request $request, $id)
    {
        $jenisPindah = JenisPindah::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.jenis-pindah')->with('sukses','Data berhasil diupdate!');
    }

    public function jenisDelete($id)
    {
        $jenisPindah = JenisPindah::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.jenis-pindah')->with('sukses','Data berhasil dihapus!');
    }

    /* Klarifikasi Pindah */

    public function klarifikasi()
    {
        $klarifikasiPindah = KlarifikasiPindah::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.klarifikasi-pindah',compact('klarifikasiPindah'));
    }

    public function klarifikasiStore(Request $request)
    {
        $klarifikasiPindah = KlarifikasiPindah::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.klarifikasi-pindah')->with('sukses','Data berhasil ditambahkan!');;
    }

    public function klarifikasiUpdate(Request $request, $id)
    {
        $klarifikasiPindah = KlarifikasiPindah::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.klarifikasi-pindah')->with('sukses','Data berhasil diupdate!');;
    }

    public function klarifikasiDelete($id)
    {
        $klarifikasiPindah = KlarifikasiPindah::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.klarifikasi-pindah')->with('sukses','Data berhasil dihapus!');;
    }
    /* Jabatan */

    public function jabatan()
    {
        $jabatans = Jabatan::paginate(10);
        return view('dashboard.pengelola.pustakalainnya.jabatan',compact('jabatans'));
    }

    public function jabatanStore(Request $request)
    {
        $jabatans = Jabatan::create([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.jabatan')->with('sukses','Data berhasil ditambahkan!');;
    }

    public function jabatanUpdate(Request $request, $id)
    {
        $jabatans = Jabatan::where('id',$id)->update([
            'deskripsi'     => $request->deskripsi
        ]);
        return redirect()->route('dashboard.pengelola.pustakalainnya.jabatan')->with('sukses','Data berhasil diupdate!');;
    }

    public function jabatanDelete($id)
    {
        $jabatans = Jabatan::where('id',$id)->delete();
        return redirect()->route('dashboard.pengelola.pustakalainnya.jabatan')->with('sukses','Data berhasil dihapus!');;
    }
}
