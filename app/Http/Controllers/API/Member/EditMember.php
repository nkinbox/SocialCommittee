<?php

namespace App\Http\Controllers\API\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use App\Models\CommitteePositions;
use App\Models\User;
use App\Models\ProfileDocuments;
use Illuminate\Support\Facades\Auth;

class EditMember extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:3');
    }
    public function pendingApplications() {
        $members = MemberDetails::where('status', 'p')->paginate(10);
        return response()->json([
            'message'=>'success',
            'members'=> $members
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
    public function edit(Request $request) {
        $member = MemberDetails::find($request->member_id);
        $lobbyheads = MemberDetails::find(User::where('positionid', CommitteePositions::where('position_name', 'Lobby Head')->pluck('position_id')->first())
        ->where('membership_status', 'ON')->get());
        $positions = CommitteePositions::all();
        return response()->json([
            'message' => 'success',
            'data' => ['member' => $member, 'lobbyheads' => $lobbyheads, 'positions' => $positions]
            ]);
    }
    public function update(Request $request) {
        $id = $request->member_id;
        $request->validate([
            'member_id' => 'exists:member_details,member_id',
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
            'doa' => 'nullable|date',
            'dor' => 'nullable|date',
            'current_address' => 'required|max:250',
            'permanent_address' => 'max:250',
            'photograph' => 'nullable|image|max:2000',
            'docs_name.*' => 'nullable|max:100',
            'docs.*' => 'nullable|image|max:2000',
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
        $photograph = null;
        if($request->hasFile('photograph')) {
            $extn = $request->file('photograph')->getClientOriginalExtension();
            $photograph = md5(str_random(20).time()) . '.' .$extn;
            $request->file('photograph')->storeAs(
                'public/photograph', $photograph
            );
        }
        $member = MemberDetails::find($id);
        $status = $member->status;
        $member->lobbyhead_id = $request->lobbyhead_id;
        $member->membership_no = $request->membership_no;
        $member->id_card = $request->id_card;
        $member->status = $request->status;
        $member->fees_mode = $request->fees_mode;
        $member->membership_status = $membership_status;
        if(!is_null($photograph))
        $member->image_name = $photograph;
        if(is_null($member->approved_on) && $request->status == 'a')
        $member->approved_on = date("Y-m-d");
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

        if($request->hasFile('docs')) {
            $documents = array();
        foreach($request->file('docs') as $key=>$doc) {
            $extn = $doc->getClientOriginalExtension();
            $document = md5(str_random(20).time()) . '.' .$extn;
            $doc->storeAs(
                'public/documents', $document
            );
            $docname = "(name not given)";
            if(array_key_exists($key, $request->docs_name) && $request->docs_name[$key] != null)
            $docname = $request->docs_name[$key];
            $documents[] = array("member_id" => $id, "document_name" => $docname, "file_name" => $document);
        }
        ProfileDocuments::insert($documents);
        }
        return response()->json(['message'=>"success"]);
    }
    public function position_allot(Request $request) {
        $member = User::find($request->member_id);
        if($member != null) {
        $member->positionid = $request->position_id;
        $member->save();
        }
        return response()->json(['message'=>"success"]);
    }
    public function destroy($id) {

    }
}
