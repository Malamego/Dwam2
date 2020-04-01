<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Evpost extends Model
{
  protected $fillable = [
       'evcat_id', 'title', 'image', 'keyword', 'content', 'desc', 'status', 'user_id'
  ];

  public function evcategory_relation()
  {
      return $this->belongsTo('App\Models\Evcategory', 'evcat_id');
  }

  public function user_relation()
  {
      return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function evtaqs_relation()
  {
      return $this->belongsToMany('App\Models\Evtaq', 'evposts_taqs', 'evpost_id', 'evtaq_id');
  }
}
