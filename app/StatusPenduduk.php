<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPenduduk extends Model
{
    protected $table = 'ref_status_penduduk';

    protected $fillable = ['deskripsi'];
}
