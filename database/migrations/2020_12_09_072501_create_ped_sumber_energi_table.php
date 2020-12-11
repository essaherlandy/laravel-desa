<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedSumberEnergiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ped_sumber_energi', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->string('lokasi');
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
        Schema::dropIfExists('ped_sumber_energi');
    }
}
