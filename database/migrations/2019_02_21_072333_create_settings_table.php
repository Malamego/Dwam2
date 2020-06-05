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
            $table->string('key')->nullable(true);
            $table->longtext('value')->nullable(true);
            $table->string('sitename');                       // Txt For Site name
            $table->string('bannersliderimage')->nullable(true);              // banner bannersliderimage
            $table->string('bannerslidertxt1')->nullable(true);              // First Text For Banner
            $table->string('bannersliderspantxt')->nullable(true);           // Span for Text slider
            $table->string('bannerslidertxt2')->nullable(true);              // Second text for Text slider
            $table->string('bannersliderptxt')->nullable(true);              // Paragraph text for Text slider
            // Testimonials (شهادات)
            $table->string('bannertestisliderimage')->nullable(true);              // Image for Testimonials
            $table->string('testcentertxt')->nullable(true);                 // Text in center for Testimonials
            $table->string('testptxt')->nullable(true);                     // Paragraph Text for Testimonials
            $table->string('testyellowtxt')->nullable(true);                // yellow Text for Testimonials
            $table->string('testcentertxt2')->nullable(true);               // Footer center text under yellow Text for Testimonials
            // Logo Slider
            $table->string('logosliderimg')->nullable(true);              // Logo Slider
            // Audio
            $table->string('audioimg')->nullable(true);                    // Image for Audio
            $table->string('audioh4txt')->nullable(true);                  // H4 for Audio Text
            $table->string('audioptxt')->nullable(true);                  // Paragraph for Audio Text
            $table->string('audiosource')->nullable(true);                // Audio Source
            // Quote (vision)
            $table->string('quoteimg')->nullable(true);                     // Image for Quote
            $table->string('quoteh5txt')->nullable(true);                  // h5 for Quote
            $table->string('quoteh3txt')->nullable(true);                   // h3 for Quote
            // Shooting (Video)
            $table->string('shootingspantxt')->nullable(true);              // Span Background Text for shooting Video
            $table->string('shootingh3txt')->nullable(true);              // H3 Text for shooting Video
            $table->string('shootingptxt')->nullable(true);             // paragraph Text for shooting Video
            $table->string('shootingimg')->nullable(true);              // Image  for shooting Video
            $table->longtext('shootingvideo')->nullable(true);              // Video Link  for shooting Video
            // our team (details in about us)
            $table->string('teamspantxt')->nullable(true);                 // text span for team span
            $table->string('team1img')->nullable(true);                    // Image  for first person in team
            $table->string('team2img')->nullable(true);                    // Image  for Second person in team
            $table->string('team3img')->nullable(true);                    // Image  for Third person in team
            $table->string('team4img')->nullable(true);                    // Image  for Fourth person in team
            $table->string('team1name')->nullable(true);                 // Name for first person in our team
            $table->string('team2name')->nullable(true);                 // Name for Second person in our team
            $table->string('team3name')->nullable(true);                 // Name for Third person in our team
            $table->string('team4name')->nullable(true);                 // Name for Fourth person in our team
            $table->string('team1role')->nullable(true);                 // Role for first Person in our team
            $table->string('team2role')->nullable(true);                 // Role for Second Person in our team
            $table->string('team3role')->nullable(true);                 // Role for Third Person in our team
            $table->string('team4role')->nullable(true);                 // Role for Fourth Person in our team
            $table->string('team1fb')->nullable(true);                   // Facebook  for first person in team
            $table->string('team2fb')->nullable(true);                   // Facebook  for Second person in team
            $table->string('team3fb')->nullable(true);                   // Facebook  for Third person in team
            $table->string('team4fb')->nullable(true);                   // Facebook  for Fourth person in team
            $table->string('team1tw')->nullable(true);                   // Twitter  for first person in team
            $table->string('team2tw')->nullable(true);                   // Twitter  for Second person in team
            $table->string('team3tw')->nullable(true);                   // Twitter  for Third person in team
            $table->string('team4tw')->nullable(true);                   // Twitter  for Fourth person in team
            $table->string('team1in')->nullable(true);                   // Insta  for first person in team
            $table->string('team2in')->nullable(true);                   // Insta  for Second person in team
            $table->string('team3in')->nullable(true);                   // Insta  for Third person in team
            $table->string('team4in')->nullable(true);                   // Insta  for Fourth person in team
            //Footer
            $table->string('footertxt')->nullable(true);               // Txt For footer
            $table->string('facebook')->nullable(true);               // Txt For facebook
            $table->string('twitter')->nullable(true);                // Txt For twitter
            $table->string('youtube')->nullable(true);               // Txt For youtube
            $table->string('insta')->nullable(true);                 // Txt For insta

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
