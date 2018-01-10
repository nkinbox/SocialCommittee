<?php

namespace App\Http\Controllers\API\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;

class AllMembers extends Controller
{   
    public function __construct()
    {
        $this->middleware('authLevel:4');
    }
    public function show() {
        $members = MemberDetails::where('membership_status' , 'ON')->has('userModel')->paginate(10);
        return response()->json([
            "message" => "success",
            "members" => $members
        ]);
    }
}
