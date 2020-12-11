<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefRwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_rw', function (Blueprint $table) {
            $table->id();
            $table->char('nomor_rw',10);
            $table->float('luas_wilayah');
            $table->bigInteger('id_dusun');
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
        Schema::dropIfExists('ref_rw');
    }
}
