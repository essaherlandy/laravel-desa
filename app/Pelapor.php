<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    protected $table = 'ref_pelapor';

    protected $fillable = ['deskripsi'];

    public function meninggal()
    {
        return $this->hasOne('App\Meninggal', 'id','id_pelapor');
    }
}
