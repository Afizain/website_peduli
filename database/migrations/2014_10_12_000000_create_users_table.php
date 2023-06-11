<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status');
            $table->integer('id_dataDiri')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function($table) {
            $table->foreign('id_dataDiri')->references('id_dataDiri')->on('data_diris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}