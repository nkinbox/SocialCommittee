<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use Illuminate\Support\Facades\Auth;

class ShowMember extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:2')->except('profile');
    }
    public function profile() {
        $member = MemberDetails::find(Auth::id());
        return view('Member.Profile')->with('member', $member);
    }
}
