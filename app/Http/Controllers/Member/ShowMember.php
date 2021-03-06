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
        $nominees = $member->nominee()->where('deleted','n')->get();
        $docs = $member->profileDocs()->get();
        return view('Member.Profile')->with([
            'member' => $member,
            'nominees' => $nominees,
            'profile_docs' => $docs,
        ]);
    }
    public function show($id) {
        $member = MemberDetails::find($id);
        $nominees = $member->nominee()->where('deleted','n')->get();
        $docs = $member->profileDocs()->get();
        return view('Member.Profile')->with([
            'member' => $member,
            'nominees' => $nominees,
            'profile_docs' => $docs,
        ]);
    }
}
