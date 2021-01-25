<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $fillable = ['nomor_surat','tanggal_surat','tanggal_awal','tanggal_akhir','nomor_registrasi','judul_surat','keterangan','kata_penutup','kode_surat','id_perangkat','id_penduduk','created_at'];

    public function kode()
    {
        return $this->belongsTo('App\KodeSurat','id');
    }
}
