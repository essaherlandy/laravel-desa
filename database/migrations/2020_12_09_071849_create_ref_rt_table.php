<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_rt', function (Blueprint $table) {
            $table->id();
            $table->char('nomor_rt',10);
            $table->float('luas_wilayah');
            $table->bigInteger('id_rw');
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
        Schema::dropIfExists('ref_rt');
    }
}
