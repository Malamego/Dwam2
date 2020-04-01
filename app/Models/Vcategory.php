<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Vcategory extends Model
{
    protected $fillable = [
        'title','image', 'keyword', 'summary', 'desc'
    ];

}
