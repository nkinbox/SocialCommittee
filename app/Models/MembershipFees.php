<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MembershipFees extends Model
{
    protected $table = "membership_fees";
    protected $primaryKey = "fees_id";
    public $timestamps = false;
}
