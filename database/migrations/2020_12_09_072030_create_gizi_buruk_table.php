<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiziBurukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gizi_buruk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('berat_badan');
            $table->bigInteger('tinggi_badan');
            $table->date('tgl_timbang');
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
        Schema::dropIfExists('gizi_buruk');
    }
}
