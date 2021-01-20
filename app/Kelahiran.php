<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $table = 'kelahiran';

    protected $fillable = [
        'tgl_kelahiran',
        'nama_bayi',
        'id_jenis_kelamin',
        'berat_bayi',
        'panjang_bayi',
        'nama_ayah',
        'nama_ibu',
        'is_kembar',
        'lokasi_lahir',
        'tempat_lahir',
        'penolong',
        'id_keluarga',
        'nama_pelapor',
        'id_pelapor',
        'id_penduduk',
        'id_surat',
        'kepala_desa'
    ];

    public function jenis_kelamin(){
        return $this->belongsTo('App\JenisKelamin', 'id_jenis_kelamin');
    }
}
