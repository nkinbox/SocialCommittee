<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    protected $table = "bank_details";
    protected $primaryKey = "bank_id";
    public $timestamps = false;
}
