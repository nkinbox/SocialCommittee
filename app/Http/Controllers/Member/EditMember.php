<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use App\Models\CommitteePositions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditMember extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:3');
    }
    public function pendingApplications() {
        $members = MemberDetails::where('status', 'p')->paginate(10);
        return view('Member.MembersList')->with('members', $members);
    }
    public function show($id) {
        $member = MemberDetails::find($id);
        return view('Member.Profile')->with('member', $member);
    }
    public function edit($id) {
        $member = MemberDetails::find($id);
        $lobbyheads = MemberDetails::find(User::where('positionid', CommitteePositions::where('position_name', 'Lobby Head')->pluck('position_id')->first())
        ->where('membership_status', 'ON')->get());
        $positions = CommitteePositions::all();
        return view('Member.EditMember')->with(['member' => $member, 'lobbyheads' => $lobbyheads, 'positions' => $positions]);
    }
    public function update(Request $request, $id) {
        $request->validate([
            'membership_no' => 'required_if:status,a|max:10',
            'lobbyhead_id' => 'exists:member_details,member_id',
            'id_card' => 'max:1',
            'status' => 'max:1',
            'fees_mode' => 'max:3',
            'railway_id' => 'max:45',
            'voter_id' => 'max:45',
            'aadhar_no' => 'max:45',
            'pancard_no' => 'max:45',
            'mobile_no' => 'required|max:10',
            'altmobile_no' => 'max:10',
            'pf_no' => 'max:45',
            'designation' => 'max:45',
            'hq' => 'max:50',
            'salutation' => 'required|max:5',
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'father_husband_name' => 'required|max:65',
            'email' => 'required|email|max:45',
            'dob' => 'required|date',
            'doa' => 'date',
            'dor' => 'date',
            'current_address' => 'required|max:250',
            'permanent_address' => 'max:250',
        ]);
        $membership_status = "OFF";
        if($request->status == "a") {
            $membership_status = "ON";
        }
        $user = User::find($id);
        if($user != null) {
            $user->membership_status = $membership_status;
            $user->membership_no = $request->membership_no;
            $user->save();
        }
        $member = MemberDetails::find($id);
        $status = $member->status;
        $member->lobbyhead_id = $request->lobbyhead_id;
        $member->membership_no = $request->membership_no;
        $member->id_card = $request->id_card;
        $member->status = $request->status;
        $member->fees_mode = $request->fees_mode;
        $member->membership_status = $membership_status;
        //$member->image_name = $request->
        //$member->image_extn = $request->
        $member->railway_id = $request->railway_id;
        $member->voter_id = $request->voter_id;
        $member->aadhar_no = $request->aadhar_no;
        $member->pancard_no = $request->pancard_no;
        $member->mobile_no = $request->mobile_no;
        $member->altmobile_no = $request->altmobile_no;
        $member->pf_no = $request->pf_no;
        $member->designation = $request->designation;
        $member->hq = $request->hq;
        $member->salutation = $request->salutation;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->father_husband_name = $request->father_husband_name;
        $member->email = $request->email;
        $member->dob = date('Y-m-d', strtotime($request->dob));
        $member->doa = date('Y-m-d', strtotime($request->doa));
        $member->dor = date('Y-m-d', strtotime($request->dor));
        $member->current_address = $request->current_address;
        $member->permanent_address = $request->permanent_address;
        $member->save();
        if($status == "p" && $request->status == "a")
        return redirect()->route('pendingApproval')->with('message', "Member Approved Successfully.");
        return redirect('home')->with('message', "Member Details Updated Successfully.");
    }
    public function position_allot(Request $request, $id) {
        $member = User::find($id);
        if($member != null) {
        $member->positionid = $request->position_id;
        $member->save();
        }
        return redirect('home')->with('message', "Member Details Updated Successfully.");
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
