<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use App\Models\MemberDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'membership_no' => 'required|max:10|unique:members|exists:member_details',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $member_id = MemberDetails::where('membership_no', $data['membership_no'])->pluck('member_id')->all();
        User::create([
            'member_id' => $member_id[0],
            'membership_no' => $data['membership_no'],
            'password' => bcrypt($data['password']),
        ]);
        

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());
        return response()->json(array("message"=>"success"));
    }
}
