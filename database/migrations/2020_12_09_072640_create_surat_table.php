<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->dateTime('tanggal_surat');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->bigInteger('nomor_registrasi');
            $table->string('judul_surat');
            $table->text('keterangan');
            $table->text('kata_penutup');
            $table->bigInteger('kode_surat');
            $table->bigInteger('id_perangkat');
            $table->bigInteger('id_penduduk');
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
        Schema::dropIfExists('surat');
    }
}
