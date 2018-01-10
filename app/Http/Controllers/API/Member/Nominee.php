<?php

namespace App\Http\Controllers\API\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nominee as NomineeModel;

class Nominee extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:6');
    }
    public function index($member_id) {
        return view('Nominee.AddNominee')->with('member_id', $member_id);
    }
    public function store(Request $request) {
        $request->validate([
            'member_id' => 'required|exists:member_details',
            'salutation' => 'max:5',
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'email' => 'email|max:45',
            'relationship' => 'required|max:45',
            'mobile_no' => 'required|max:10',
            'altmobile_no' => 'max:10',
            'address' => 'required|max:250',
        ]);
        $nominee = new NomineeModel;
        $nominee->member_id = $request->member_id;
        $nominee->salutation = $request->salutation;
        $nominee->first_name = $request->first_name;
        $nominee->last_name = $request->last_name;
        $nominee->email = $request->email;
        $nominee->relationship = $request->relationship;
        $nominee->mobile_no = $request->mobile_no;
        $nominee->altmobile_no = $request->altmobile_no;
        $nominee->address = $request->address;
        $nominee->save();
        return redirect('home')->with('message',"Nominee Added Successfully.");
    }
    public function edit($nominee_id) {
        $nominee = NomineeModel::find($nominee_id);
        return view('Nominee.EditNominee')->with('nominee', $nominee);
    }
    public function update(Request $request, $nominee_id) {
        $request->validate([
            'salutation' => 'max:5',
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'email' => 'email|max:45',
            'relationship' => 'required|max:45',
            'mobile_no' => 'required|max:10',
            'altmobile_no' => 'max:10',
            'address' => 'required|max:250',
        ]);
        $nominee = NomineeModel::find($nominee_id);
        $nominee->salutation = $request->salutation;
        $nominee->first_name = $request->first_name;
        $nominee->last_name = $request->last_name;
        $nominee->email = $request->email;
        $nominee->relationship = $request->relationship;
        $nominee->mobile_no = $request->mobile_no;
        $nominee->altmobile_no = $request->altmobile_no;
        $nominee->address = $request->address;
        $nominee->save();
        return redirect('home')->with('message',"Nominee Added Successfully.");
    }
    public function destroy(Request $request) {
        $nominee = NomineeModel::find($request->nominee_id);
        $nominee->deleted = 'y';
        $nominee->save();
        return redirect('home')->with('message',"Nominee Deleted Successfully.");
    }
}
