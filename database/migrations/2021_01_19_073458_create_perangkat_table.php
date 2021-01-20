<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerangkatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perangkat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_penduduk');
            $table->bigInteger('id_pangkat_gol');
            $table->bigInteger('id_jabatan');
            $table->string('nip');
            $table->string('niap');
            $table->string('no_sk_angkat');
            $table->dateTime('tgl_angkat');
            $table->string('no_sk_berhenti');
            $table->dateTime('tgl_berhenti');
            $table->enum('is_active', ['Y', 'N']);
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
        Schema::dropIfExists('perangkat');
    }
}
