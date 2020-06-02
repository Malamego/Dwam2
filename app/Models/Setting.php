<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $fillable = [
       'key', 'value', 'sitename', 'bannersliderimage', 'bannerslidertxt1',
       'bannersliderspantxt', 'bannerslidertxt2', 'bannersliderptxt', 'bannertestisliderimage',
       'testcentertxt', 'testptxt', 'testyellowtxt', 'testcentertxt2',
       'logosliderimg', 'audioimg', 'audioh4txt', 'audioptxt',
       'audiosource', 'quoteimg', 'quoteh5txt', 'quoteh3txt',
       'shootingspantxt', 'shootingh3txt', 'shootingptxt', 'shootingimg',
       'shootingvideo', 'teamspantxt', 'team1img', 'team2img', 'team3img', 'team4img',
       'team1name', 'team2name', 'team3name', 'team4name', 'team1role', 'team2role', 'team3role',
       'team4role', 'team1fb', 'team2fb', 'team3fb', 'team4fb', 'team1tw', 'team2tw', 'team3tw',
       'team4tw', 'team1in', 'team2in', 'team3in', 'team4in', 'footertxt', 'facebook', 'twitter',
       'youtube','insta'
  ];
}
