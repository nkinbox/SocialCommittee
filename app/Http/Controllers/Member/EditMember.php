<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use Illuminate\Support\Facades\Auth;

class EditMember extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:3');
    }
    public function pendingApplications() {
        $members = MemberDetails::where('status', 'p')->paginate(10);
        return view('Member.PendingMembers')->with('members', $members);
    }
    public function show($id) {
        $member = MemberDetails::find($id);
        return view('Member.Profile')->with('member', $member);
    }
    public function edit(Request $request, $id) {

    }
    public function destroy($id) {

    }
    /*
            $request->validate([
            'membership_no' => 'required|max:',
            'membership_status' => 'required|max:',
            'id_card' => 'required|max:',
            'applied_on' => 'required|max:',
            'approved_on' => 'required|max:',
            'status' => 'required|max:',
            'nominee_id' => 'required|max:',
            'referral_id' => 'required|max:',
            'lobbyhead_id' => 'required|max:',
            'image_name' => 'required|max:',
            'image_extn' => 'required|max:',
            'added_by' => 'required|max:',
            'fees_mode' => 'required|max:',
            'railway_id' => 'required|max:',
            'voter_id' => 'required|max:',
            'aadhar_no' => 'required|max:',
            'pancard_no' => 'required|max:',
            'mobile_no' => 'required|max:',
            'altmobile_no' => 'required|max:',
            'pf_no' => 'required|max:',
            'designation' => 'required|max:',
            'hq' => 'required|max:',
            'salutation' => 'required|max:',
            'first_name' => 'required|max:',
            'last_name' => 'required|max:',
            'father_husband_name' => 'required|max:',
            'email' => 'required|max:',
            'dob' => 'required|max:',
            'doa' => 'required|max:',
            'dor' => 'required|max:',
            'current_address' => 'required|max:',
            'permanent_address' => 'required|max:',
        ]);


                $member = new MemberDetails;
        $member->id_card = $request->
        $member->applied_on = $request->
        $member->approved_on = $request->
        $member->status = $request->
        $member->nominee_id = $request->
        $member->referral_id = $request->
        $member->lobbyhead_id = $request->
        $member->image_name = $request->
        $member->image_extn = $request->
        $member->added_by = $request->
        $member->fees_mode = $request->
        $member->railway_id = $request->
        $member->voter_id = $request->
        $member->aadhar_no = $request->
        $member->pancard_no = $request->
        $member->mobile_no = $request->
        $member->altmobile_no = $request->
        $member->pf_no = $request->
        $member->designation = $request->
        $member->hq = $request->
        $member->salutation = $request->
        $member->first_name = $request->
        $member->last_name = $request->
        $member->father_husband_name = $request->
        $member->email = $request->
        $member->dob = $request->
        $member->doa = $request->
        $member->dor = $request->
        $member->current_address = $request->
        $member->permanent_address = $request->
        $member->save();
    */
}
