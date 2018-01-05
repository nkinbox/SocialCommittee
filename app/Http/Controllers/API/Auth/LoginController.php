<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'membership_no' => 'required|max:10',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->add("message","fail"));
        }
        $user = User::where('membership_no',$request->membership_no)
        ->where('membership_status', 'ON')->first();     
        if($user != null && Hash::check($request->password, $user->getAuthPassword())) {
            $token = Hash::make($request->membership_no . time());
            $user->api_token = $token;
            $user->save();
            return response()->json(array(
               "message"=>"success",
               "api_token"=>$token
            ));
        } else {
            return response()->json(array("message"=>"fail"));
        }
    }

    public function logout()
    {   
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return response()->json(array("message"=>"success"));
    }
}
