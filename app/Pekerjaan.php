<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'ref_pekerjaan';

    protected $fillable = ['deskripsi','deskripsi_singkat'];
}
