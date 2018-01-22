<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipFees extends Model
{
    protected $table = "membership_fees";
    protected $primaryKey = "fees_id";
    public $timestamps = false;
    public function member() {
        return $this->hasOne('App\Models\MemberDetails', 'member_id', 'member_id');
    }
    public function receipt() {
        return $this->hasOne('App\Models\Receipts', 'receipt_id', 'receipt_id');
    }
    public function cheque() {
        return $this->hasOne('App\Models\ChequeDetails', 'cheque_id', 'cheque_id');
    }
    public function ecs() {
        return $this->hasOne('App\Models\ECSDetails', 'ecs_id', 'ecs_id');
    }
    public function verifiedby() {
        return $this->hasOne('App\Models\MemberDetails', 'member_id', 'verified_by');
    }
    /*
    public function transaction() {
        return $this->hasOne('App\Model\');
    }*/
}
