<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderLogo extends Model
{
    protected $table = 'slider_logo';

    protected $fillable = ['slider_id','konten_logo'];
}
