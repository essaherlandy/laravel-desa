<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'ref_jabatan';

    protected $fillable = ['deskripsi'];
}
