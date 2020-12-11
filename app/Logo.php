<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = 'logo';

    protected $fillable = [
        'konten_logo_desa', 'konten_logo_kabupaten', 'konten_logo_kabupaten','path_css'
    ];
}
