<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChequeDetails extends Model
{
    protected $table = "cheque_details";
    protected $primaryKey = "cheque_id";
    public $timestamps = false;
}
