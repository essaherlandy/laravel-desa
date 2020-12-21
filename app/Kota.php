<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'ref_kab_kota';

    protected $fillable = ['kode_kab_kota_bps','kode_kab_kota_kemendagri','nama_kab_kota','luas_wilayah','id_provinsi'];

    public function kecamatans()
    {
        return $this->hasOne('App\Kecamatan', 'id_kab_kota');
    }

    public function provinsi(){
        return $this->belongsTo('App\Provinsi', 'id_provinsi');
    }
}
