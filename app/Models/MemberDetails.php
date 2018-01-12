<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{
    protected $table = "member_details";
    protected $primaryKey = "member_id";
    public $timestamps = false;

    public function userModel() {
        return $this->hasOne('App\Models\User', 'member_id', 'member_id');
    }
    public function nominee() {
        return $this->hasMany('App\Models\Nominee', 'member_id', 'member_id');
    }
    public function profileDocs() {
        return $this->hasMany('App\Models\ProfileDocuments', 'member_id', 'member_id');
    }
    public function bank() {
        return $this->hasMany('App\Models\BankDetails', 'member_id', 'member_id');
    }
}
