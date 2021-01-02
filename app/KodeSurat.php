<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeSurat extends Model
{
    protected $table = 'ref_kode_surat';

    protected $fillable = ['deskripsi','supra_code'];
}
