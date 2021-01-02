<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusKawin extends Model
{
    protected $table = 'ref_status_kawin';

    protected $fillable = ['deskripsi'];
}
