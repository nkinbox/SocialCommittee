<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProfileDocuments extends Model
{
    protected $table = "profile_documents";
    protected $primaryKey = "sno";
    public $timestamps = false;
}
