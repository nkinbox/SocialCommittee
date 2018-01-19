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
            'photograph' => 'nullable|image|max:2000',
            'address' => 'required|max:250',
        ]);
        $photograph = null;
        if($request->hasFile('photograph')) {
            $extn = $request->file('photograph')->getClientOriginalExtension();
            $photograph = md5(str_random(20).time()) . '.' .$extn;
            $request->file('photograph')->storeAs(
                'public/photograph', $photograph
            );
        }
        $nominee = new NomineeModel;
        $nominee->member_id = $request->member_id;
        $nominee->salutation = $request->salutation;
        $nominee->first_name = $request->first_name;
        $nominee->last_name = $request->last_name;
        $nominee->email = $request->email;
        $nominee->relationship = $request->relationship;
        $nominee->mobile_no = $request->mobile_no;
        $nominee->altmobile_no = $request->altmobile_no;
        $nominee->image_name = $photograph;
        $nominee->address = $request->address;
        $nominee->save();
        return response()->json(['message'=>'success']);
    }
    public function edit(Request $request) {
        $nominee = NomineeModel::find($request->nominee_id);
        return response()->json([
            'message' => 'success',
            'nominee' => $nominee
            ]);
    }
    public function update(Request $request) {
        $request->validate([
            'nominee_id' => 'required|exists:nominee',
            'salutation' => 'max:5',
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'email' => 'email|max:45',
            'relationship' => 'required|max:45',
            'mobile_no' => 'required|max:10',
            'altmobile_no' => 'max:10',
            'photograph' => 'nullable|image|max:2000',
            'address' => 'required|max:250',
        ]);
        $photograph = null;
        if($request->hasFile('photograph')) {
            $extn = $request->file('photograph')->getClientOriginalExtension();
            $photograph = md5(str_random(20).time()) . '.' .$extn;
            $request->file('photograph')->storeAs(
                'public/photograph', $photograph
            );
        }
        $nominee = NomineeModel::find($request->nominee_id);
        $nominee->salutation = $request->salutation;
        $nominee->first_name = $request->first_name;
        $nominee->last_name = $request->last_name;
        $nominee->email = $request->email;
        $nominee->relationship = $request->relationship;
        $nominee->mobile_no = $request->mobile_no;
        $nominee->altmobile_no = $request->altmobile_no;
        $nominee->image_name = $photograph;
        $nominee->address = $request->address;
        $nominee->save();
        return response()->json(['message'=>'success']);
    }
    public function destroy(Request $request) {
        $request->validate([
            'nominee_id' => 'required|exists:nominee',
        ]);
        $nominee = NomineeModel::find($request->nominee_id);
        $nominee->deleted = 'y';
        $nominee->save();
        return response()->json(['message'=>'success']);
    }
}
