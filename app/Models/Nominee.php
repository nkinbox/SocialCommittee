<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $table = "nominee";
    protected $primaryKey = "nominee_id";
    public $timestamps = false;
}
