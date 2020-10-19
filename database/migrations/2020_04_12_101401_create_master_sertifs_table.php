<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sertifs', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            // $table->foreign('nik')->references('nik')->on('employees');
            $table->integer('id_posisi');
            // $table->foreign('id_posisi')->references(('id_posisi'))->on('positions');
            $table->integer('id_training');
            // $table->foreign('id_training')->references('id_training')->on('trainings');
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
        Schema::dropIfExists('master_sertifs');
    }
}
