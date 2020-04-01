<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // For Forgen Key Checks Disable
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->longtext('value');
            $table->string('sitename');                      // Txt For Site name
            $table->string('bannersliderimage');              // banner bannersliderimage
            $table->string('bannerslidertxt1');              // First Text For Banner
            $table->string('bannersliderspantxt');           // Span for Text slider
            $table->string('bannerslidertxt2');              // Second text for Text slider
            $table->string('bannersliderptxt');              // Paragraph text for Text slider
            // Testimonials (شهادات)
            $table->string('bannertestisliderimage');              // Image for Testimonials
            $table->string('testcentertxt');                 // Text in center for Testimonials
            $table->string('testptxt');                     // Paragraph Text for Testimonials
            $table->string('testyellowtxt');                // yellow Text for Testimonials
            $table->string('testcentertxt2');               // Footer center text under yellow Text for Testimonials
            // Logo Slider
            $table->string('logosliderimg');              // Logo Slider
            // Audio
            $table->string('audioimg');                    // Image for Audio
            $table->string('audioh4txt');                  // H4 for Audio Text
            $table->string('audioptxt');                  // Paragraph for Audio Text
            $table->string('audiosource');                // Paragraph for Audio Text
            // Quote (vision)
            $table->string('quoteimg');                     // Image for Quote
            $table->string('quoteh5txt');                  // h5 for Quote
            $table->string('quoteh3txt');                   // h3 for Quote
            // Shooting (Video)
            $table->string('shootingspantxt');              // Span Background Text for shooting Video
            $table->string('shootingh3txt');              // H3 Text for shooting Video
            $table->string('shootingptxt');             // paragraph Text for shooting Video
            $table->string('shootingimg');              // Image  for shooting Video
            $table->string('shootingvideo');              // Video Link  for shooting Video
            //Footer
            $table->string('footertxt');               // Txt For footer
            $table->string('facebook');               // Txt For facebook
            $table->string('twitter');                // Txt For twitter
            $table->string('youtube');               // Txt For youtube
            $table->string('insta');                 // Txt For insta

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints(); // For Forgen Key Checks Enable
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
