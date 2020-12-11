<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_kecamatan', function (Blueprint $table) {
            $table->id();
            $table->char('kode_kecamatan_bps',20);
            $table->char('kode_kecamatan_kemendagri',20);
            $table->string('nama_kecamatan');
            $table->float('luas_wilayah');
            $table->bigInteger('id_kab_kota');
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
        Schema::dropIfExists('ref_kecamatan');
    }
}
