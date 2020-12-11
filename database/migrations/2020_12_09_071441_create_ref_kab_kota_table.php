<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefKabKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_kab_kota', function (Blueprint $table) {
            $table->id();
            $table->char('kode_kab_kota_bps',20);
            $table->char('kode_kab_kota_kemendagri',20);
            $table->string('nama_kab_kota');
            $table->float('luas_wilayah');
            $table->bigInteger('id_provinsi');
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
        Schema::dropIfExists('ref_kab_kota');
    }
}
