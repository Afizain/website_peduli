<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_aduans', function (Blueprint $table) {
            $table->increments('id_aduan')->length(10);
            $table->text('statement');
            $table->string('bukti_foto');
            $table->integer('id_user')->unsigned();
            $table->timestamps();
        });
        Schema::table('data_aduans', function($table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_aduans');
    }
}