<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedPerkebunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ped_perkebunan', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi',100);
            $table->string('penggarap');
            $table->bigInteger('jumlah_penggarap');
            $table->float('luas');
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
        Schema::dropIfExists('ped_perkebunan');
    }
}
