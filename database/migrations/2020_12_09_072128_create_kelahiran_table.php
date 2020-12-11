<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelahiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahiran', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_kelahiran');
            $table->string('nama_bayi');
            $table->bigInteger('id_jenis_kelamin');
            $table->string('berat_bayi',10);
            $table->bigInteger('panjang_bayi');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->enum('is_kembar', ['Y', 'N']);
            $table->string('lokasi_lahir');
            $table->string('tempat_lahir');
            $table->string('penolong');
            $table->bigInteger('id_keluarga');
            $table->string('nama_pelapor');
            $table->bigInteger('id_pelapor');
            $table->bigInteger('id_penduduk');
            $table->bigInteger('id_surat');
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
        Schema::dropIfExists('kelahiran');
    }
}
