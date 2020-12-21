<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'ref_kecamatan';

    protected $fillable = ['kode_kecamatan_bps','kode_kecamatan_kemendagri','nama_kecamatan','luas_wilayah','id_kab_kota'];

    public function kotas(){
        return $this->belongsTo('App\Kota', 'id_kab_kota');
    }
}
