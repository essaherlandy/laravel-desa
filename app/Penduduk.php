<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $fillable = ['nik','nama','tempat_lahir','tanggal_lahir','foto','no_telp','email','no_kitas','no_paspor','is_sementara','id_rt','id_rw','id_dusun','id_pendidikan','is_bsm','id_agama','id_goldar','id_pendidikan_terakhir','id_jenis_kelamin','id_kewarganegaraan','id_pekerjaan','id_pekerjaan_penduduk','id_kompetensi','id_status_kawin','id_status_penduduk','id_status_tinggal','id_difabilitas','id_kontrasepsi',''];

    public function jenis_kelamin(){
        return $this->belongsTo('App\JenisKelamin', 'id_jenis_kelamin');
    }
}
