<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            // $table->foreign('kode')->references('kode')->on('alternatifs');
            $table->string('nama_alternatif');
            // $table->foreign('nama_alternatif')->references('nama_alternatif')->on('alternatifs');
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
        Schema::dropIfExists('nilai_alternatifs');
    }
}
