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


Edit member

<form action="{{route('editMember' , ['id' => $member->member_id])}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<select name="lobbyhead_id">
    <option value="1">None Selected</option>
    @if(count($lobbyheads)>0)
    @foreach($lobbyheads as $lobbyhead)
    <option value="{{$lobbyhead->member_id}}"{{ ($member->lobbyhead_id == $lobbyhead->member_id) ? ' selected' : ''}}>{{$lobbyhead->first_name . ' ' .$lobbyhead->last_name}}</option>
    @endforeach
    @endif
</select>

<input type="text" name="membership_no" placeholder="Membership_no"  value="{{ old('membership_no', $member->membership_no) }}">

<select name="id_card">
    <option value="n"{{ ($member->id_card == "n") ? ' selected' : '' }}>Not Issued</option>
    <option value="y"{{ ($member->id_card == "y") ? ' selected' : ''}}>Issued</option>
</select>

<select name="status">
    <option value="p"{{ ($member->status == "p") ? ' selected' : '' }}>Pending For Approval</option>
    <option value="r"{{ ($member->status == "r") ? ' selected' : '' }}>Rejected</option>
    <option value="a"{{ ($member->status == "a") ? ' selected' : '' }}>Approved</option>
    <option value="s"{{ ($member->status == "s") ? ' selected' : '' }}>Suspended</option>
</select>

<select name="fees_mode">
    <option value="0">None Selected</option>
    <option value="cas"{{ ($member->fees_mode == "cas") ? ' selected' : '' }}>Cash</option>
    <option value="ecs"{{ ($member->fees_mode == "ecs") ? ' selected' : ''}}>ECS</option>
    <option value="pdc"{{ ($member->fees_mode == "pdc") ? ' selected' : ''}}>Post Dated Cheque</option>
</select>
    <select name="salutation">
        <option{{ ($member->salutation == "Mr.") ? ' selected' : '' }}>Mr.</option>
        <option{{ ($member->salutation == "Ms.") ? ' selected' : '' }}>Ms.</option>
        <option{{ ($member->salutation == "Mrs.") ? ' selected' : '' }}>Mrs.</option>
    </select>
<input type="text" name="first_name" placeholder="first_name"  value="{{ old('first_name', $member->first_name) }}">
<input type="text" name="last_name" placeholder="last_name" value="{{ old('last_name', $member->last_name) }}">
<input type="text" name="hq" placeholder="hq" value="{{ old('hq', $member->hq) }}">
<input type="text" name="designation" placeholder="designation" value="{{ old('designation', $member->designation) }}">
<input type="text" name="pf_no" placeholder="pf_no" value="{{ old('pf_no', $member->pf_no) }}">
<input type="text" name="father_husband_name" placeholder="father_husband_name" value="{{ old('father_husband_name', $member->father_husband_name) }}">
<input type="text" name="email" placeholder="email" value="{{ old('email', $member->email) }}">
<input type="text" name="dob" placeholder="dob" value="{{ old('dob', date('d-m-Y', strtotime($member->dob))) }}">
<input type="text" name="doa" placeholder="doa" value="{{ old('doa', date('d-m-Y', strtotime($member->doa))) }}">
<input type="text" name="dor" placeholder="dor" value="{{ old('dor', date('d-m-Y', strtotime($member->dor))) }}">

<input type="text" name="railway_id" placeholder="railway_id" value="{{ old('railway_id', $member->railway_id) }}">
<input type="text" name="voter_id" placeholder="voter_id" value="{{ old('voter_id', $member->voter_id) }}">
<input type="text" name="aadhar_no" placeholder="aadhar_no" value="{{ old('aadhar_no', $member->aadhar_no) }}">
<input type="text" name="pancard_no" placeholder="pancard_no" value="{{ old('pancard_no', $member->pancard_no) }}">
<input type="text" name="mobile_no" placeholder="mobile_no" value="{{ old('mobile_no', $member->mobile_no) }}">
<input type="text" name="altmobile_no" placeholder="altmobile_no" value="{{ old('altmobile_no', $member->altmobile_no) }}">
<input type="text" name="current_address" placeholder="current_address" value="{{ old('current_address', $member->current_address) }}">
<input type="text" name="permanent_address" placeholder="permanent_address" value="{{ old('permanent_address', $member->permanent_address) }}">
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

<form action="{{route('positionAllot' , ['id' => $member->member_id])}}" method="post">
        {{ csrf_field() }}
    <select name="position_id">
        @if(count($positions) > 0)\
        @foreach($positions as $position)
        <option value="{{$position->position_id}}">{{$position->position_name}}</option>
        @endforeach
        @endif
    </select>
    <input type="hidden" name="_method" value="put">
    <button>Submit</button>
</form>

@endsection













