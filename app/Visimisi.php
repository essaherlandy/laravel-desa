<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $table = 'visi_misi';

    protected $fillable = ['id_pengguna','isi_visi_misi','foto_banner'];

    public function users(){
        return $this->belongsTo('App\User', 'id_pengguna');
    }
}
