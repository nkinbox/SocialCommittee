<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankDetails;
use App\Models\MemberDetails;
use Illuminate\Support\Facades\Auth;

class Bank extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:8')->except('index');
    }

    public function index()
    {
        $banks = BankDetails::where('member_id',Auth::id())->get();
        return view('Finance.ViewBank')->with('banks', $banks);
    }

    public function create($member)
    {
        $member = MemberDetails::where('member_id', $member)
        ->orWhere('membership_no', $member)->first();
        return view('Finance.AddBank')->with('member', $member);
    }

    public function store(Request $request)
    {
        $request->validate([
            "member_id" => "exists:member_details,member_id",
            "acc_no" => "required|max:45",
            "ifsc_code" => "required|max:45",
            "bank_name" => "required|max:60",
            "branch_name" => "required|max:60",
        ]);

        $bank = new BankDetails;
        $bank->member_id = $request->member_id;
        $bank->acc_no = $request->acc_no;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->bank_name = $request->bank_name;
        $bank->branch_name = $request->branch_name;
        $bank->save();

        return redirect('home')->with('message',"Bank Created Successfully.");
    }

    public function show($bank_id)
    {
        $banks = BankDetails::where('bank_id',$bank_id)->with('member')->get();
        return view('Finance.ViewBank')->with('banks', $banks);
    }

    public function edit($bank_id)
    {
        $bankDetails = BankDetails::where('bank_id',$bank_id)->with('member')->first();
        return view('Finance.EditBank')->with('bankDetails', $bankDetails);
    }

    public function update(Request $request)
    {
        $request->validate([
            "bank_id" => "exists:bank_details",
            "acc_no" => "required|max:45",
            "ifsc_code" => "required|max:45",
            "bank_name" => "required|max:60",
            "branch_name" => "required|max:60",
        ]);

        $bank = BankDetails::find($request->bank_id);
        $bank->acc_no = $request->acc_no;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->bank_name = $request->bank_name;
        $bank->branch_name = $request->branch_name;
        $bank->save();

        return redirect('home')->with('message',"Bank Created Successfully.");
    }

    public function destroy($id)
    {
        //
    }
}
