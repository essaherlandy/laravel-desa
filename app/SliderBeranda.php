<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderBeranda extends Model
{
    protected $table = 'slider_beranda';

    protected $fillable = ['konten_background','konten_logo','konten_text'];

    public function slider_logo()
    {
        return $this->hasOne('App\SliderLogo', 'slider_id');
    }
}
