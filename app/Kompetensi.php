<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    protected $table = 'ref_kompetensi';

    protected $fillable = ['deskripsi'];
}
