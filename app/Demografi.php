<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    protected $table = 'demografi';

    protected $fillable = ['id_pengguna','isi_demografi','foto_banner'];

    public function users(){
        return $this->belongsTo('App\User', 'id_pengguna');
    }
}
