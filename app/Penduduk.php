<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $fillable = ['nik','nama','tempat_lahir','tgl_lahir','foto','no_telp','email','no_kitas','no_paspor','is_sementara','id_rt','id_rw','id_dusun','id_pendidikan','is_bsm','id_agama','id_goldar','id_pendidikan_terakhir','id_jenis_kelamin','id_kewarganegaraan','id_pekerjaan','id_pekerjaan_penduduk','id_kompetensi','id_status_kawin','id_status_penduduk','id_status_tinggal','id_difabilitas','id_kontrasepsi',''];

    public function jenis_kelamin(){
        return $this->belongsTo('App\JenisKelamin', 'id_jenis_kelamin');
    }
    public function rw()
    {
        return $this->belongsTo('App\RW', 'id_rw');
    }

    public function rt()
    {
        return $this->belongsTo('App\RT', 'id_rt');
    }

    public function dusun()
    {
        return $this->belongsTo('App\Dusun', 'id_dusun');
    }

    public function keluarga()
    {
        return $this->belongsTo('App\Keluarga','id','id_penduduk');
    }

    public function perangkat()
    {
        return $this->belongsTo('App\Perangkat','id_penduduk');
    }

}
