<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemografiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demografi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengguna');
            $table->text('isi_demografi');
            $table->timestamp('waktu');
            $table->string('foto_banner');
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
        Schema::dropIfExists('demografi');
    }
}
