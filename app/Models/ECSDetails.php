<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ECSDetails extends Model
{
    protected $table = "ecs_details";
    protected $primaryKey = "ecs_id";
    public $timestamps = false;
}
