<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'ref_agama';

    protected $fillable = ['deskripsi','is_diakui'];
}
