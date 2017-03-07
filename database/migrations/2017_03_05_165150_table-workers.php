<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('charge');
           // $table->integer('charge_id')->unsigned();
            //$table->foreign('charge_id')->references('id')->on('charges')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
