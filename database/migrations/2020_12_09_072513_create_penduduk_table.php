<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('foto');
            $table->char('no_telp');
            $table->string('email');
            $table->string('no_kitas');
            $table->string('no_paspor');
            $table->enum('is_sementara', ['Y', 'N']);
            $table->bigInteger('id_rt');
            $table->bigInteger('id_rw');
            $table->bigInteger('id_dusun');
            $table->bigInteger('id_pendidikan');
            $table->enum('is_bsm', ['Y', 'N']);
            $table->bigInteger('id_agama');
            $table->bigInteger('id_goldar');
            $table->bigInteger('id_pendidikan_terakhir');
            $table->bigInteger('id_jenis_kelamin');
            $table->bigInteger('id_kewarganegaraan');
            $table->bigInteger('id_pekerjaan');
            $table->bigInteger('id_pekerjaan_penduduk');
            $table->bigInteger('id_kompetensi');
            $table->bigInteger('id_status_kawin');
            $table->bigInteger('id_status_penduduk');
            $table->bigInteger('id_status_tinggal');
            $table->bigInteger('id_difabilitas');
            $table->bigInteger('id_kontrasepsi');
            $table->double('pendapatan_per_bulan');
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
        Schema::dropIfExists('penduduk');
    }
}
