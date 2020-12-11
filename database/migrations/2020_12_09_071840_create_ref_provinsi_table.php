<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_provinsi', function (Blueprint $table) {
            $table->id();
            $table->char('kode_provinsi_bps',10);
            $table->char('kode_provinsi_kemendagri',10);
            $table->string('nama_provinsi');
            $table->float('luas_wilayah');
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
        Schema::dropIfExists('ref_provinsi');
    }
}
