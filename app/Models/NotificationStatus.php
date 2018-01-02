<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NotificationStatus extends Model
{
    protected $table = "notification_status";
    protected $primaryKey = "sno";
    public $timestamps = false;
}
