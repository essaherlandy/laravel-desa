<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKondisiKehamilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_kehamilan', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->dateTime('tgl_hpl');
            $table->enum('is_resti', ['Y', 'N']);
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
        Schema::dropIfExists('kondisi_kehamilan');
    }
}
