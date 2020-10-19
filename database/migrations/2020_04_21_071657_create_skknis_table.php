<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkknisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skknis', function (Blueprint $table) {
            $table->id();
            $table->string('cnc', 100);
            $table->string('course');
            $table->string('nama_pelatihan');
            $table->string('provider');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('jumlah_peserta');
            $table->enum('kriteria', array('I', 'P', 'S'))->nullable();
            $table->integer('anggaran');
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
        Schema::dropIfExists('skknis');
    }
}
