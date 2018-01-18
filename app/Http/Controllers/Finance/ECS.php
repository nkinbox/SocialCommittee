<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use App\Models\BankDetails;
use App\Models\ECSDocuments;
use App\Models\ECSDetails;

class ECS extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:7');
    }
    public function index()
    {
        $all_ecs = ECSDetails::where('status', 'a')
        ->with('member')
        ->with('documents')
        ->with('bank')
        ->get();
        return view('Finance.AllECS')->with('all_ecs', $all_ecs);
    }

    public function create($member)
    {
        $member = MemberDetails::where('member_id', $member)
        ->orWhere('membership_no', $member)->first();
        $banks = null;
        if(!is_null($member))
        $banks = $member->bank;
        return view('Finance.AddECS')->with([
            'member' => $member,
            'banks' => $banks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "member_id" => "exists:member_details,member_id",
            "bank_id" => "nullable|exists:bank_details",
            "acc_no" => "required_without:bank_id|max:45",
            "ifsc_code" => "required_without:bank_id|max:45",
            "bank_name" => "required_without:bank_id|max:60",
            "branch_name" => "required_without:bank_id|max:60",
            "payment_for" => "required|max:2",
            "valid_from" => "required|date",
            "valid_till" => "required|date",
            'docs_name.*' => 'nullable|max:100',
            'docs.*' => 'nullable|image|max:2000',
        ]);
        $bank_id = $request->bank_id;
        if(is_null($bank_id)) {
        $bank = new BankDetails;
        $bank->member_id = $request->member_id;
        $bank->acc_no = $request->acc_no;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->bank_name = $request->bank_name;
        $bank->branch_name = $request->branch_name;
        $bank->save();
        $bank_id = $bank->bank_id;
        }

        $ecs = new ECSDetails;
        $ecs->member_id = $request->member_id;
        $ecs->bank_id = $bank_id;
        $ecs->payment_for = $request->payment_for;
        $ecs->valid_from = $request->valid_from;
        $ecs->valid_till = $request->valid_till;
        $ecs->save();

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
                $documents[] = array("document_name" => $docname, "ecs_id" => $ecs->ecs_id, "file_name" => $document);
            }
            ECSDocuments::insert($documents);
        }
        return redirect('home')->with('message',"ECS Created Successfully.");
    }

    public function show($ecs_id)
    {
        $ecs = ECSDetails::where('ecs_id', $ecs_id)
        ->with('member')
        ->with('documents')
        ->with('bank')
        ->with('finance')
        ->first();
        return view('Finance.ViewECS')->with('ecs', $ecs);
    }

    public function edit($ecs_id)
    {
        $ecs = ECSDetails::where('ecs_id', $ecs_id)
        ->with('member')
        ->with('documents')
        ->with('bank')
        ->first();
        return view('Finance.EditECS')->with('ecs', $ecs);
    }

    public function update(Request $request)
    {
        $request->validate([
            "ecs_id" => "exists:ecs_details",
            "payment_for" => "required|max:2",
            "valid_from" => "required|date",
            "valid_till" => "required|date",
            'docs_name.*' => 'nullable|max:100',
            'docs.*' => 'nullable|image|max:2000',
        ]);

        $ecs = ECSDetails::find($request->ecs_id);
        $ecs->payment_for = $request->payment_for;
        $ecs->valid_from = $request->valid_from;
        $ecs->valid_till = $request->valid_till;
        $ecs->save();

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
                $documents[] = array("document_name" => $docname, "ecs_id" => $request->ecs_id, "file_name" => $document);
            }
            ECSDocuments::insert($documents);
        }
        return redirect('home')->with('message',"ECS Updated Successfully.");
    }

    public function destroy(Request $request)
    {
        $request->validate([
            "ecs_id" => "exists:ecs_details",
        ]);

        $ecs = ECSDetails::find($request->ecs_id);
        $ecs->status = 'u';
        $ecs->save();

        return redirect('home')->with('message',"ECS is Unactivated.");
    }
}
