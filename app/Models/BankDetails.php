<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    protected $table = "bank_details";
    protected $primaryKey = "bank_id";
    public $timestamps = false;
    public function member() {
        return $this->hasOne('App\Models\MemberDetails','member_id','member_id');
    }
}
