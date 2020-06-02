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
            $table->string('key')->unique()->default(1);
            $table->longtext('value')->default("olashValue");
            $table->string('sitename');                       // Txt For Site name
            $table->string('bannersliderimage')->nullable();              // banner bannersliderimage
            $table->string('bannerslidertxt1')->nullable();              // First Text For Banner
            $table->string('bannersliderspantxt')->nullable();           // Span for Text slider
            $table->string('bannerslidertxt2')->nullable();              // Second text for Text slider
            $table->string('bannersliderptxt')->nullable();              // Paragraph text for Text slider
            // Testimonials (شهادات)
            $table->string('bannertestisliderimage')->nullable();              // Image for Testimonials
            $table->string('testcentertxt')->nullable();                 // Text in center for Testimonials
            $table->string('testptxt')->nullable();                     // Paragraph Text for Testimonials
            $table->string('testyellowtxt')->nullable();                // yellow Text for Testimonials
            $table->string('testcentertxt2')->nullable();               // Footer center text under yellow Text for Testimonials
            // Logo Slider
            $table->string('logosliderimg')->nullable();              // Logo Slider
            // Audio
            $table->string('audioimg')->nullable();                    // Image for Audio
            $table->string('audioh4txt')->nullable();                  // H4 for Audio Text
            $table->string('audioptxt')->nullable();                  // Paragraph for Audio Text
            $table->string('audiosource')->nullable();                // Audio Source
            // Quote (vision)
            $table->string('quoteimg')->nullable();                     // Image for Quote
            $table->string('quoteh5txt')->nullable();                  // h5 for Quote
            $table->string('quoteh3txt')->nullable();                   // h3 for Quote
            // Shooting (Video)
            $table->string('shootingspantxt')->nullable();              // Span Background Text for shooting Video
            $table->string('shootingh3txt')->nullable();              // H3 Text for shooting Video
            $table->string('shootingptxt')->nullable();             // paragraph Text for shooting Video
            $table->string('shootingimg')->nullable();              // Image  for shooting Video
            $table->longtext('shootingvideo')->nullable();              // Video Link  for shooting Video
            // our team (details in about us)
            $table->string('teamspantxt')->nullable();                 // text span for team span
            $table->string('team1img')->nullable();                    // Image  for first person in team
            $table->string('team2img')->nullable();                    // Image  for Second person in team
            $table->string('team3img')->nullable();                    // Image  for Third person in team
            $table->string('team4img')->nullable();                    // Image  for Fourth person in team
            $table->string('team1name')->nullable();                 // Name for first person in our team
            $table->string('team2name')->nullable();                 // Name for Second person in our team
            $table->string('team3name')->nullable();                 // Name for Third person in our team
            $table->string('team4name')->nullable();                 // Name for Fourth person in our team
            $table->string('team1role')->nullable();                 // Role for first Person in our team
            $table->string('team2role')->nullable();                 // Role for Second Person in our team
            $table->string('team3role')->nullable();                 // Role for Third Person in our team
            $table->string('team4role')->nullable();                 // Role for Fourth Person in our team
            $table->string('team1fb')->nullable();                   // Facebook  for first person in team
            $table->string('team2fb')->nullable();                   // Facebook  for Second person in team
            $table->string('team3fb')->nullable();                   // Facebook  for Third person in team
            $table->string('team4fb')->nullable();                   // Facebook  for Fourth person in team
            $table->string('team1tw')->nullable();                   // Twitter  for first person in team
            $table->string('team2tw')->nullable();                   // Twitter  for Second person in team
            $table->string('team3tw')->nullable();                   // Twitter  for Third person in team
            $table->string('team4tw')->nullable();                   // Twitter  for Fourth person in team
            $table->string('team1in')->nullable();                   // Insta  for first person in team
            $table->string('team2in')->nullable();                   // Insta  for Second person in team
            $table->string('team3in')->nullable();                   // Insta  for Third person in team
            $table->string('team4in')->nullable();                   // Insta  for Fourth person in team
            //Footer
            $table->string('footertxt')->nullable();               // Txt For footer
            $table->string('facebook')->nullable();               // Txt For facebook
            $table->string('twitter')->nullable();                // Txt For twitter
            $table->string('youtube')->nullable();               // Txt For youtube
            $table->string('insta')->nullable();                 // Txt For insta

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
