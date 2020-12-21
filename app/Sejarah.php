<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    protected $table = 'sejarah';

    protected $fillable = ['id_pengguna','isi_sejarah','foto_banner','create_at'];
}
