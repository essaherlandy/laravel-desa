<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'ref_desa';

    protected $fillable = ['kode_desa_bps','kode_desa_kemendagri','nama_desa','luas_wilayah','id_kecamatan','id_penduduk','alamat_desa','kode_pos'];
}
