<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evcategories', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('image')->nullable();
          $table->longtext('summary');
          $table->string('keyword');
          $table->longtext('desc');
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
        Schema::dropIfExists('evcategories');
    }
}
