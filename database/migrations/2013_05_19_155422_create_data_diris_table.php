<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_diris', function (Blueprint $table) {
            $table->increments('id_dataDiri')->length(10);
            $table->string('nama_lengkap')->length(25);
            $table->string('no_telp')->length(12);            
            $table->string('nama_perumahan')->length(25);
            $table->string('rt')->length(3);
            $table->string('rw')->length(3);
            // $table->integer('id_user')->unsigned();
            $table->string('photo');
            $table->timestamps();
        });
        // Schema::table('data_diris', function($table) {
        //     $table->foreign('id_user')->references('id_user')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_diris');
    }
}