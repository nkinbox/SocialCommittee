<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemberDetails;
use App\Models\ECSFinance;
use App\Models\ECSDetails;
use App\Models\Receipts;
use App\Models\ChequeDetails;
use App\Models\MembershipFees as MembershipFeesModel;
use Illuminate\Support\Facades\Auth;

class MembershipFees extends Controller
{
    public function __construct()
    {
        //$this->middleware('authLevel:7');
    }
    // checks if ecs exists and is active.
    // add data to ecsfinance
    private function ecs_expected($member_id) {
        $ecs = ECSDetails::where('member_id', $member_id)
        ->where('payment_for', 'mf')
        ->where('status', 'a')->first();
        if(is_null($ecs)) {
            return false;
        }
        if(strtotime($ecs->valid_from) < strtotime($ecs->valid_till)) {
            if(strtotime($ecs->valid_till) < time())
            $ecs->status = 'u';
            $ecs->save();
            return false;
        }
        $ecs_finance = new ECSFinance;
        $ecs_finance->ecs_id = $ecs->ecs_id;
        $ecs_finance->scheduled_on = date('Y-m-d');
        $ecs_finance->save();
        return $ecs->ecs_id;
    }

    // makes predefined entry to membershipfees
    private function expecting_membershipfees($member_id, $fees_mode) {
        $charged = MembershipFeesModel::where('member_id', $member_id)
        ->where('month', date('M'))
        ->where('_year', date('Y'))->first();
        if(is_null($charged)) {
        $mf = new MembershipFeesModel;        
        $mf->member_id = $member_id;
        $mf->amount = "1000.00";
        $mf->payable = "1000.00";
        $mf->month = date('M');
        $mf->_year = date('Y');
        if($fees_mode == 'ecs') {
            $ecs_id = $this->ecs_expected($member_id);
            if($ecs_id) {
                $mf->ecs_id = $ecs_id;
                $mf->pay_method = $fees_mode;
            } else {
                $mf->pay_method = 'cas';
            }
        } else {
            $mf->pay_method = $fees_mode;
        }
        $mf->save();
        }
    }

    // adds 1200 to payable in membershipfees
    private function add_fine($fees_id) {
        $fine = MembershipFeesModel::find($fees_id);
        //$fine->payable = $fine->payable + 200;
        $fine->payable = 1200;
        $fine->save();
    }

    // loops through all the members
    // and calls excepting_membershipfees
    public function charge() {
        $members = MemberDetails::select('member_id', 'fees_mode')->where('membership_status', 'ON')->get();
        foreach($members as $member) {
            $this->expecting_membershipfees($member->member_id, $member->fees_mode);
        }
        return 'charged';
    }

    // loops through all the members
    // finds all the defaulters
    public function defaulters() {
        $fees = MembershipFeesModel::select('fees_id', 'member_id')
        ->where('status', 'pay')
        ->where('month', date('M'))
        ->where('_year', date('Y'))->get();
        foreach($fees as $fees_) {
            $this->add_fine($fees_->fees_id);
        }

    }

    // gets all fees by logged in user
    public function index() {
        $history = MembershipFeesModel::where('member_id', Auth::id())
        ->with('ecs')->with('cheque')->with('receipt')->with('verifiedby')
        ->orderBy('fees_id', 'desc')->paginate(6);
        return view('Finance.ViewFees')->with('all_fees', $history);
    }
    // gives statement of particular monts fees
    public function show($fees_id) {
        $fees = MembershipFeesModel::where('member_id', Auth::id())->where('fees_id', $fees_id)
        ->with('ecs')->with('cheque')->with('receipt')->with('verifiedby')->first();
        return view('Finance.FeesStatement')->with('fees', $fees);
    }

    // shows last pending fees and asks for payment method
    public function payment() {
        $fees = MembershipFeesModel::where('member_id', Auth::id())
        ->where('pay_method', '!=' , 'ecs')
        ->where('status', 'pay')->first();
        return view('Finance.PayFees')->with('fees', $fees);
    }

    // response to $this->payment()
    public function client_pay(Request $request) {
        $request->validate([
            'fees_id' => 'required|exists:membership_fees',
            'pay_method' => 'required|string|max:3',
            'bank_name' => 'required_if:pay_method,chq|max:100',
            'cheque_no' => 'required_if:pay_method,chq|max:45',
            'receipt' => 'required_if:pay_method,trf|image|max:2000',
        ]);
        /*
        cas ->Cash
        trf ->Bank Transfer or Cash Deposit
        chq ->Cheque
        oln ->Online
        */
        $mf = MembershipFeesModel::where('fees_id',$request->fees_id)
        ->where('member_id', Auth::id())->first();
        if(is_null($mf)) {
            return "An Error Occured";
        }
        switch($request->pay_method) {
            case 'oln':
            return redirect()->route('billdesk',['fees_id' => $request->fees_id]);
            break;
            case 'trf':
            if($request->hasFile('receipt')) {
                $extn = $request->file('receipt')->getClientOriginalExtension();
                $receipt = md5(str_random(20).time()) . '.' .$extn;
                $request->file('receipt')->storeAs(
                    'public/documents', $receipt
                );
            }
            $receipt_ = new Receipts;
            $receipt_->file_name = $receipt;
            $receipt_->save();
            $mf->receipt_id = $receipt_->receipt_id;
            break;
            case 'chq':
            $cheque = new ChequeDetails;
            $cheque->bank_name = $request->bank_name;
            $cheque->cheque_no = $request->cheque_no;
            $cheque->save();
            $mf->cheque_id = $cheque->cheque_id;
            break;
            default:
            return redirect('home')->with('message',"Make Cash Payment to Your Lobby Head");
        }        
        $mf->status = "paid";
        $mf->paid_on = date('Y-m-d');
        $mf->pay_method = $request->pay_method;
        $mf->save();
        return redirect('home')->with('message',"Payment Sent for Verification.");
    }
}
