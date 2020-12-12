<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = ['id_pengguna','gambar','judul_berita','isi_berita','created_at'];

    public function users(){
        return $this->belongsTo('App\User', 'id_pengguna');
    }
}
