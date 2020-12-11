<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_desa', function (Blueprint $table) {
            $table->id();
            $table->char('kode_desa_bps',20);
            $table->char('kode_desa_kemendagri',20);
            $table->string('nama_desa');
            $table->float('luas_wilayah');
            $table->bigInteger('id_kecamatan');
            $table->bigInteger('id_penduduk');
            $table->text('alamat_desa');
            $table->char('kode_pos',6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_desa');
    }
}
