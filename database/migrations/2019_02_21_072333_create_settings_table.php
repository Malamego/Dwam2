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
            $table->string('key');
            $table->longtext('value');
            $table->string('sitename');                    // Txt For Site name
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
            $table->string('audiosource');                // Audio Source
            // Quote (vision)
            $table->string('quoteimg');                     // Image for Quote
            $table->string('quoteh5txt');                  // h5 for Quote
            $table->string('quoteh3txt');                   // h3 for Quote
            // Shooting (Video)
            $table->string('shootingspantxt');              // Span Background Text for shooting Video
            $table->string('shootingh3txt');              // H3 Text for shooting Video
            $table->string('shootingptxt');             // paragraph Text for shooting Video
            $table->string('shootingimg');              // Image  for shooting Video
            $table->longtext('shootingvideo');              // Video Link  for shooting Video
            // our team (details in about us)
            $table->string('teamspantxt');                 // text span for team span
            $table->string('team1img');                    // Image  for first person in team
            $table->string('team2img');                    // Image  for Second person in team
            $table->string('team3img');                    // Image  for Third person in team
            $table->string('team4img');                    // Image  for Fourth person in team
            $table->string('team1name');                 // Name for first person in our team
            $table->string('team2name');                 // Name for Second person in our team
            $table->string('team3name');                 // Name for Third person in our team
            $table->string('team4name');                 // Name for Fourth person in our team
            $table->string('team1role');                 // Role for first Person in our team
            $table->string('team2role');                 // Role for Second Person in our team
            $table->string('team3role');                 // Role for Third Person in our team
            $table->string('team4role');                 // Role for Fourth Person in our team
            $table->string('team1fb');                   // Facebook  for first person in team
            $table->string('team2fb');                   // Facebook  for Second person in team
            $table->string('team3fb');                   // Facebook  for Third person in team
            $table->string('team4fb');                   // Facebook  for Fourth person in team
            $table->string('team1tw');                   // Twitter  for first person in team
            $table->string('team2tw');                   // Twitter  for Second person in team
            $table->string('team3tw');                   // Twitter  for Third person in team
            $table->string('team4tw');                   // Twitter  for Fourth person in team
            $table->string('team1in');                   // Insta  for first person in team
            $table->string('team2in');                   // Insta  for Second person in team
            $table->string('team3in');                   // Insta  for Third person in team
            $table->string('team4in');                   // Insta  for Fourth person in team
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
