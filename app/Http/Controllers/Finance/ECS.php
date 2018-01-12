<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use App\Models\BankDetails;
use App\Models\ECSDocuments;

class ECS extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:7');
    }
    public function index()
    {
        //
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
        ]);/*
        $bank = new BankDetails;
        $bank->member_id
        $bank->acc_no
        $bank->ifsc_code*/
        //INSERT INTO `bank_details` (`bank_id`, `member_id`, `acc_no`, `ifsc_code`, `bank_name`, `branch_name`) VALUES (NULL, '1', '123456', '2131', '321321', '1231');

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
            $documents[] = array("document_name" => $docname, "ecs_id" => $id, "file_name" => $document);
        }
        ECSDocuments::insert($documents);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
