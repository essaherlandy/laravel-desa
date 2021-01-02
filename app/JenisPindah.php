<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPindah extends Model
{
    protected $table = 'ref_jenis_pindah';

    protected $fillable = ['deskripsi'];
}
