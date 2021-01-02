<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HubunganKeluarga extends Model
{
    protected $table = 'hubungan_keluarga';

    protected $fillable = ['nama_ayah','nama_ibu','id_penduduk','id_keluarga','id_status_keluarga'];

    public function keluarga(){
        return $this->belongsTo('App\Keluarga', 'id_keluarga');
    }
}
