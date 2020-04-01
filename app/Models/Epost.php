<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Epost extends Model
{
  protected $fillable = [
       'epcat_id', 'title', 'image', 'keyword', 'content', 'desc', 'status', 'user_id'
  ];

  public function epcategory_relation()
  {
      return $this->belongsTo('App\Models\Epcategory', 'epcat_id');
  }

  public function user_relation()
  {
      return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function eptaqs_relation()
  {
      return $this->belongsToMany('App\Models\Eptaq', 'eposts_taqs', 'epost_id', 'eptaq_id');
  }
}
