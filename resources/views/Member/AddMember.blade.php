@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
add member
<form action="{{route('addMember')}}" method="post">
        {{ csrf_field() }}
    <select name="salutation">
        <option>Mr</option>
    </select>
<input type="text" name="first_name" placeholder="first_name">
<input type="text" name="last_name" placeholder="last_name">
<input type="text" name="hq" placeholder="hq">
<input type="text" name="designation" placeholder="designation">
<input type="text" name="pf_no" placeholder="pf_no">
<input type="text" name="father_husband_name" placeholder="father_husband_name">
<input type="text" name="email" placeholder="email">
<input type="text" name="dob" placeholder="dob">
<input type="text" name="doa" placeholder="doa">
<input type="text" name="dor" placeholder="dor">
<input type="text" name="introduced_by" placeholder="referral_Membership no">
<input type="text" name="railway_id" placeholder="railway_id">
<input type="text" name="voter_id" placeholder="voter_id">
<input type="text" name="aadhar_no" placeholder="aadhar_no">
<input type="text" name="pancard_no" placeholder="pancard_no">
<input type="text" name="mobile_no" placeholder="mobile_no">
<input type="text" name="altmobile_no" placeholder="altmobile_no">
<input type="text" name="current_address" placeholder="current_address">
<input type="text" name="permanent_address" placeholder="permanent_address">
<button>Submit</button>

</form>
@endsection
