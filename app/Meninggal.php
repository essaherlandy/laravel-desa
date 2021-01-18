<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    protected $table = 'meninggal';

    protected $fillable = ['tgl_meninggal','nama','sebab','id_penduduk','penentu_kematian','tempat_kematian','id_pelapor','nama_pelapor','id_surat'];

    public function hubungan_pelapor(){
        return $this->belongsTo('App\Pelapor','id_pelapor');
    }
}
