<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{
    protected $table = "member_details";
    protected $primaryKey = "member_id";
    public $timestamps = false;
}
