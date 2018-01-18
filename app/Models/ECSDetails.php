<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ECSDetails extends Model
{
    protected $table = "ecs_details";
    protected $primaryKey = "ecs_id";
    public $timestamps = false;

    public function member() {
        return $this->hasOne('App\Models\MemberDetails', 'member_id', 'member_id');
    }
    public function documents() {
        return $this->hasMany('App\Models\ECSDocuments', 'ecs_id', 'ecs_id');
    }
    public function bank() {
        return $this->hasOne('App\Models\BankDetails', 'bank_id', 'bank_id');
    }
    public function finance() {
        return $this->hasMany('App\Models\ECSFinance', 'ecs_id', 'ecs_id');
    }
}
