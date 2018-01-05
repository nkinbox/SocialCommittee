<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "members";
    protected $primaryKey = "member_id";
    public $timestamps = false;
    protected $fillable = [
        'member_id', 'membership_no', 'password'
    ];
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'otp'
    ];

    public function position() {
        return $this->hasOne('App\Models\CommitteePositions', 'position_id', 'positionid');
    }

    public function profile() {
        $user = $this->hasOne('App\Models\MemberDetails', 'member_id', 'member_id');
        return $user;
         
    }
    
}
