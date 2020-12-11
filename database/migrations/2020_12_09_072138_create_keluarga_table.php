<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('alamat_jalan');
            $table->enum('is_sementara', ['Y', 'N']);
            $table->enum('is_raskin', ['Y', 'N']);
            $table->enum('is_jamkesmas', ['Y', 'N']);
            $table->enum('is_pkh', ['Y', 'N']);
            $table->bigInteger('id_kelas_sosial');
            $table->bigInteger('id_kepala_keluarga');
            $table->bigInteger('id_rt');
            $table->bigInteger('id_rw');
            $table->bigInteger('id_dusun');
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
        Schema::dropIfExists('keluarga');
    }
}
