<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpostsTaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eposts_taqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('epost_id')->unsigned();
            $table->foreign('epost_id')->references('id')->on('eposts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('eptaq_id')->unsigned();
            $table->foreign('eptaq_id')->references('id')->on('eptaqs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('eposts_taqs');
    }
}
