<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    protected $table = 'ref_status_keluarga';

    protected $fillable = ['deskripsi'];
}
