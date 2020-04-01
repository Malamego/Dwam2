<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvpostsTaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evposts_taqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evpost_id')->unsigned();
            $table->foreign('evpost_id')->references('id')->on('evposts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('evtaq_id')->unsigned();
            $table->foreign('evtaq_id')->references('id')->on('evtaqs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('evposts_taqs');
    }
}
