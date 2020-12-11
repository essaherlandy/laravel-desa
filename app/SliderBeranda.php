<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderBeranda extends Model
{
    protected $table = 'slider_beranda';

    protected $fillable = ['konten_background','konten_logo','konten_text'];
}
