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
<form action="{{route('addMember')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<select name="salutation">
    <option>Mr.</option>
    <option>Ms.</option>
    <option>Mrs.</option>
</select>
<input type="text" name="first_name" placeholder="first_name"  value="{{ old('first_name') }}">
<input type="text" name="last_name" placeholder="last_name" value="{{ old('last_name') }}">
<input type="text" name="hq" placeholder="hq" value="{{ old('hq') }}">
<input type="text" name="designation" placeholder="designation" value="{{ old('designation') }}">
<input type="text" name="pf_no" placeholder="pf_no" value="{{ old('pf_no') }}">
<input type="text" name="father_husband_name" placeholder="father_husband_name" value="{{ old('father_husband_name') }}">
<input type="text" name="email" placeholder="email" value="{{ old('email') }}">
<input type="text" name="dob" placeholder="dob" value="{{ old('dob') }}">
<input type="text" name="doa" placeholder="doa" value="{{ old('doa') }}">
<input type="text" name="dor" placeholder="dor" value="{{ old('dor') }}">
<input type="text" name="introduced_by" placeholder="referral_Membership no" value="{{ old('introduced_by') }}">
<input type="text" name="railway_id" placeholder="railway_id" value="{{ old('railway_id') }}">
<input type="text" name="voter_id" placeholder="voter_id" value="{{ old('voter_id') }}">
<input type="text" name="aadhar_no" placeholder="aadhar_no" value="{{ old('aadhar_no') }}">
<input type="text" name="pancard_no" placeholder="pancard_no" value="{{ old('pancard_no') }}">
<input type="text" name="mobile_no" placeholder="mobile_no" value="{{ old('mobile_no') }}">
<input type="text" name="altmobile_no" placeholder="altmobile_no" value="{{ old('altmobile_no') }}">
<input type="text" name="current_address" placeholder="current_address" value="{{ old('current_address') }}">
<input type="text" name="permanent_address" placeholder="permanent_address" value="{{ old('permanent_address') }}">
<div>
Passport Image<input type="file" name="photograph">
<div>
<input type="text" name="docs_name[]" placeholder="Document Name">
<input type="file" name="docs[]">
</div>
<div>
<input type="text" name="docs_name[]" placeholder="Document Name">
<input type="file" name="docs[]">
</div>
<div>
<input type="text" name="docs_name[]" placeholder="Document Name">
<input type="file" name="docs[]">
</div>
<div>
<input type="text" name="docs_name[]" placeholder="Document Name">
<input type="file" name="docs[]">
</div>
<div>
<input type="text" name="docs_name[]" placeholder="Document Name">
<input type="file" name="docs[]">
</div>
</div>
<button>Submit</button>

</form>
@endsection
