<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MembershipFees;
use App\Models\ChequeDetails;
use Illuminate\Support\Facades\Auth;

class ApprovalMF extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:9');
    }

    public function all($only = "0") {
        if($only == "1") {
        $fees = MembershipFees::where('status', 'paid')
        ->where('pay_method', 'chq')
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        } elseif($only == "2") {
        $fees = MembershipFees::where('status', 'paid')
        ->where('pay_method', 'trf')
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        } else {
        $fees = MembershipFees::where('status', 'paid')
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        }
        return view('Finance.ViewMFList')->with('fees', $fees);
    }

    public function lobby($only = "0") {
        $lobbyhead_id = Auth::user()->profile->lobbyhead_id;
        if($only == "1") {
        $fees = MembershipFees::where('status', 'paid')
        ->where('pay_method', 'chq')
        ->whereHas('member', function($query) use ($lobbyhead_id) {
             $query->where('lobbyhead_id', $lobbyhead_id);
        })
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        } elseif($only == "1") {
        $fees = MembershipFees::where('status', 'paid')
        ->where('pay_method', 'trf')
        ->whereHas('member', function($query) use ($lobbyhead_id) {
             $query->where('lobbyhead_id', $lobbyhead_id);
        })
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        } else {
        $fees = MembershipFees::where('status', 'paid')
        ->whereHas('member', function($query) use ($lobbyhead_id) {
             $query->where('lobbyhead_id', $lobbyhead_id);
        })
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        }
        return view('Finance.ViewMFList')->with('fees', $fees);
    }

    public function all_defaulters() {
        $fees = MembershipFees::where('status', 'pay')
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        return view('Finance.DefaulterList')->with('fees', $fees);
    }

    public function lobby_defaulters() {
        $lobbyhead_id = Auth::user()->profile->lobbyhead_id;
        $fees = MembershipFees::where('status', 'pay')
        ->whereHas('member', function($query) use ($lobbyhead_id) {
             $query->where('lobbyhead_id', $lobbyhead_id);
        })
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        return view('Finance.DefaulterList')->with('fees', $fees);
    }

    public function verify_payment(Request $request) {
        $fees = MembershipFees::find($request->fees_id);
        if(is_null($fees)) {
            return "An Error Occured";
        }
        if($request->status == "received") {
            $fees->status = "done";
            if($fees->pay_method == "chq") {
                $cheque = ChequeDetails::find($fees->cheque_id);
                $cheque->cleared_status="y";
                $cheque->save();
            }
        }
        if($request->status == "reject") {
            $fees->status = "pay";
            if($fees->pay_method == "chq") {
                $cheque = ChequeDetails::find($fees->cheque_id);
                $cheque->cleared_status="r";
                $cheque->save();
            }
        }
        $fees->verified_by = Auth::id();
        $fees->save();
        return redirect()->back();
    }

    public function verify_ecs_payment($ecs_id) {

    }

    /*public function all_verified() {
        $fees = MembershipFees::where('status', 'done')
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        return view('Finance.ViewMFList')->with('fees', $fees);
    }

    public function lobby_verified() {
        $fees = MembershipFees::where('status', 'done')
        ->with('member')
        ->with('ecs')
        ->with('receipt')
        ->with('cheque')
        ->with('verifiedby')->paginate(20);
        return view('Finance.ViewMFList')->with('fees', $fees);
    }*/
}
