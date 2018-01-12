<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use App\Models\ProfileDocuments;
use Illuminate\Support\Facades\Auth;
use Validator;

class AddMember extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:1');
    }

    public function index() {
        return view('Member.AddMember');
    }

    public function store(Request $request) {
        $request->validate([
            'introduced_by' => 'nullable|exists:member_details,membership_no',
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
            'photograph' => 'required|image|max:2000',
            'docs_name.*' => 'nullable|max:100',
            'docs.*' => 'nullable|image|max:2000',
        ]);
        if($request->hasFile('photograph')) {
            $extn = $request->file('photograph')->getClientOriginalExtension();
            $photograph = md5(str_random(20).time()) . '.' .$extn;
            $request->file('photograph')->storeAs(
                'public/photograph', $photograph
            );
        }
        $member = new MemberDetails;
        $referral_id = $member::where('membership_no', $request->introduced_by)->pluck('member_id')->first();
        $member->referral_id = $referral_id;
        $member->lobbyhead_id = Auth::id();
        $member->image_name = $photograph;
        $member->added_by = Auth::id();
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
        $member->member_id;

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
            $documents[] = array("member_id" => $member->member_id, "document_name" => $docname, "file_name" => $document);
        }
        ProfileDocuments::insert($documents);
        }
        return redirect('home')->with('message',"Member Details sent for Approval Successfully.");
    }
}
