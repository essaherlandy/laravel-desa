<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeninggalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meninggal', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_meninggal');
            $table->string('nama');
            $table->string('sebab');
            $table->bigInteger('id_penduduk');
            $table->string('penentu_kematian');
            $table->string('tempat_kematian');
            $table->bigInteger('id_pelapor');
            $table->string('nama_pelapor');
            $table->string('hubungan_pelapor');
            $table->bigInteger('id_surat');
            $table->string('kepala_desa');
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
        Schema::dropIfExists('meninggal');
    }
}
