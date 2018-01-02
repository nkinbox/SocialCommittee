<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Notifiable;
    protected $table = "members";
    protected $primaryKey = "member_id";
    public $timestamps = false;

}
