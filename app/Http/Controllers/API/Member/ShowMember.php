<?php

namespace App\Http\Controllers\API\Member;

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
        return response()->json([
            'message' => "success",
            'data' => ['member' => $member,
            'nominees' => $nominees,
            'profile_docs' => $docs,]
        ]);
    }
    public function show(Request $request) {
        $member = MemberDetails::find($request->member_id);
        $nominees = $member->nominee()->where('deleted','n')->get();
        $docs = $member->profileDocs()->get();
        return response()->json([
            'message' => "success",
            'data' => ['member' => $member,
            'nominees' => $nominees,
            'profile_docs' => $docs,]
        ]);
    }
}
