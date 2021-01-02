<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlarifikasiPindah extends Model
{
    protected $table = 'ref_klasifikasi_pindah';

    protected $fillable = ['deskripsi'];
}
