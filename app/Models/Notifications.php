<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = "notifications";
    protected $primaryKey = "notify_id";
    public $timestamps = false;
}
