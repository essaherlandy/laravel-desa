<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTinggal extends Model
{
    protected $table = 'ref_status_tinggal';

    protected $fillable = ['deskripsi'];
}
