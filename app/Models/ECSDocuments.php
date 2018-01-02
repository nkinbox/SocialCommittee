<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ECSDocuments extends Model
{
    protected $table = "ecs_documents";
    protected $primaryKey = "sno";
    public $timestamps = false;
}
