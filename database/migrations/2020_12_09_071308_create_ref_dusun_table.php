<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefDusunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_dusun', function (Blueprint $table) {
            $table->id();
            $table->char('kode_dusun_bps',20);
            $table->char('kode_dusun_kemendagri',20);
            $table->string('nama_dusun');
            $table->float('luas_wilayah');
            $table->bigInteger('id_desa');
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
        Schema::dropIfExists('ref_dusun');
    }
}
