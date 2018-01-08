<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use Illuminate\Support\Facades\Auth;

class LobbyMember extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:5');
    }
    public function show() {
        $members = MemberDetails::where('lobbyhead_id', Auth::user()->profile->lobbyhead_id)
        ->where('membership_status' , 'ON')->has('userModel')->paginate(10);
        return view('Member.MembersList')->with('members', $members);
    }
}
