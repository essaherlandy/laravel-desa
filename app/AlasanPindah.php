<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlasanPindah extends Model
{
    protected $table = 'ref_alasan_pindah';

    protected $fillable = ['deskripsi'];
}
