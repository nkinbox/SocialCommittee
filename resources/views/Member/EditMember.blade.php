@extends('layouts.app')

@section('content')
<main class="main-content p-4 invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="600" role="main">
    <div class="row">
    <div class="col-md-12">
    <h1 style="text-align: center">Member Form</h1>
    </div>
    </div>
    <div class="row mb-4">
    <div class="col-md-12">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-12">
            <form class="form-inline" style="float:right" action="{{route('positionAllot' , ['id' => $member->member_id])}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                <select class="form-control" name="position_id" style="margin:0">
                    @if(count($positions) > 0)
                    @foreach($positions as $position)
                    <option value="{{$position->position_id}}">{{$position->position_name}}</option>
                    @endforeach
                    @endif
                </select>
                <input type="hidden" name="_method" value="put">
                <button type="submit" class="btn btn-primary">Allot Position</button>
            </div>
            </form>
            <br><br>
    <form  action="{{route('editMember' , ['id' => $member->member_id])}}" method="post" enctype="multipart/form-data">
    <p class="lead" style="font-weight: bold">
      Settings
    </p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="membership_no" class="active">Membership Number</label>
                <input id="membership_no" class="form-control" type="text" name="membership_no" placeholder="Membership_no"  value="{{ old('membership_no', $member->membership_no) }}">
            </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
                <label for="status" class="active">Application Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="p"{{ (old('status', $member->status) == "p") ? ' selected' : '' }}>Pending For Approval</option>
                    <option value="r"{{ (old('status', $member->status) == "r") ? ' selected' : '' }}>Rejected</option>
                    <option value="a"{{ (old('status', $member->status) == "a") ? ' selected' : '' }}>Approved</option>
                    <option value="s"{{ (old('status', $member->status) == "s") ? ' selected' : '' }}>Suspended</option>
                </select>
        </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="lobbyhead" class="active">Select Lobby Head</label>
                <select id="lobbyhead" name="lobbyhead_id" class="form-control">
                    <option value="1">None Selected</option>
                    @if(count($lobbyheads)>0)
                    @foreach($lobbyheads as $lobbyhead)
                    <option value="{{$lobbyhead->member_id}}"{{ (old('lobbyhead_id', $member->lobbyhead_id) == $lobbyhead->member_id) ? ' selected' : ''}}>{{$lobbyhead->first_name . ' ' .$lobbyhead->last_name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fees_mode" class="active">Prefered Pay Method</label>
                    <select id="fees_mode" name="fees_mode" class="form-control">
                        <option value="cas"{{ (old('fees_mode', $member->fees_mode) == "cas") ? ' selected' : '' }}>Cash</option>
                        <option value="trf"{{ (old('fees_mode', $member->fees_mode) == "trf") ? ' selected' : ''}}>Bank Transfer or Deposit</option>
                        <option value="ecs"{{ (old('fees_mode', $member->fees_mode) == "ecs") ? ' selected' : ''}}>ECS</option>
                        <option value="chq"{{ (old('fees_mode', $member->fees_mode) == "chq") ? ' selected' : ''}}>Cheque</option>
                        <option value="oln"{{ (old('fees_mode', $member->fees_mode) == "oln") ? ' selected' : ''}}>Online Payment</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_card" class="active">IDCard Status</label>
                    <select id="id_card" name="id_card" class="form-control">
                        <option value="n"{{ (old('id_card', $member->id_card) == "n") ? ' selected' : '' }}>Not Issued</option>
                        <option value="y"{{ (old('id_card', $member->id_card) == "y") ? ' selected' : ''}}>Issued</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
    <p class="lead" style="font-weight: bold">
        Member Details
    </p>
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="salutation" class="active">Salutation</label>
                <select id="salutation" name="salutation" class="form-control">
                    <option{{ (old('salutation', $member->salutation) == "Mr.") ? ' selected' : '' }}>Mr.</option>
                    <option{{ (old('salutation', $member->salutation) == "Ms.") ? ' selected' : '' }}>Ms.</option>
                    <option{{ (old('salutation', $member->salutation) == "Mrs.") ? ' selected' : '' }}>Mrs.</option>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="first_name" class="active">First Name</label>
                <input id="first_name" class="form-control" type="text" name="first_name" placeholder="first_name"  value="{{ old('first_name', $member->first_name) }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="last_name" class="active">Last Name</label>
                <input id="last_name" type="text" name="last_name" class="form-control" placeholder="last_name" value="{{ old('last_name', $member->last_name) }}">
            </div>
        </div>
        </div>
        <div class="form-group">
            <label for="fhname" class="active">Father's/Husband Name</label>
            <input id="fhname" type="text" class="form-control" name="father_husband_name" placeholder="father or husband name" value="{{ old('father_husband_name', $member->father_husband_name) }}">
        </div>
        <div class="form-group">
            <label for="email" class="active">EmailID</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="email" value="{{ old('email', $member->email) }}">
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="designation" class="active">Designation</label>
            <input id="designation" type="text"  class="form-control" name="designation" placeholder="designation" value="{{ old('designation', $member->designation) }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="hq" class="active">HQ</label>
            <input id="hq" type="text" class="form-control" name="hq" placeholder="hq" value="{{ old('hq', $member->hq) }}">
        </div>
        </div>
        </div>
    
        <div class="form-group">
            <label for="Address" class="active">Current Address</label>
            <input id="Address" type="text" class="form-control" name="current_address" placeholder="current_address" value="{{ old('current_address', $member->current_address) }}">
        </div>
    
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
            <label for="dob" class="active">D.O.B</label>
            <input id="dob" type="text" class="form-control" name="dob" placeholder="dob" value="{{ old('dob', date('d-m-Y', strtotime($member->dob))) }}">
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
            <label for="doa" class="active">D.O.A</label>
            <input id="doa" type="text" class="form-control" name="doa" placeholder="doa" value="{{ old('doa', date('d-m-Y', strtotime($member->doa))) }}">
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
            <label for="dor" class="active">D.O.R</label>
            <input id="dor" type="text" class="form-control" name="dor" placeholder="dor" value="{{ old('dor', date('d-m-Y', strtotime($member->dor))) }}">
        </div>
        </div>
        </div>
    
        <div class="form-group">
            <label for="PAddress" class="active">Permanent Address</label>
            <input id="PAddress" type="text" class="form-control" name="permanent_address" placeholder="permanent_address" value="{{ old('permanent_address', $member->permanent_address) }}">
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="mobile" class="active">Mobile Number</label>
                <input id="mobile" type="text" class="form-control" name="mobile_no" placeholder="mobile_no" value="{{ old('mobile_no', $member->mobile_no) }}">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="altmobile" class="active">Alt Mobile Number</label>
                <input id="altmobile" type="text" class="form-control" name="altmobile_no" placeholder="altmobile_no" value="{{ old('altmobile_no', $member->altmobile_no) }}">
            </div>
            </div>
        </div>
    
    
    
    
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="pfno" class="active">P.F. No</label>
                <input id="pfno" type="text" class="form-control" name="pf_no" placeholder="pf_no" value="{{ old('pf_no', $member->pf_no) }}">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
            <label for="pan" class="active">PAN Card Number</label>
            <input id="pan" type="text" class="form-control" name="pancard_no" placeholder="pancard_no" value="{{ old('pancard_no', $member->pancard_no) }}">
            </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label for="vid" class="active">Voter Id No</label>
            <input id="vid" type="text" class="form-control" name="voter_id" placeholder="voter_id" value="{{ old('voter_id', $member->voter_id) }}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="ano" class="active">Aadhar No</label>
                <input id="ano" type="text" class="form-control" name="aadhar_no" placeholder="aadhar_no" value="{{ old('aadhar_no', $member->aadhar_no) }}">
                </div>
            </div>
        </div>
        <div class="form-group">
        <label for="rid" class="active">Railway Id No</label>
        <input id="rid" type="text" class="form-control" name="railway_id" placeholder="railway_id" value="{{ old('railway_id', $member->railway_id) }}">
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 ">                
                <div class="upload-button" style="position: relative">Affix Applicant<br> Recent Passport<br> Size Photograph
                <img class="profile-pic" style="position: absolute; top:0; left:0" src="{{ asset('public/photograph/' . $member->image_name) }}" />
                </div>
                <input name="photograph" class="file-upload" type="file" accept="image/*"/>
            </div>
        </div>
        <!-- <hr style="border:3px solid #122f3b"> -->
        <br>
        <hr>
        <p class="lead" style="font-weight: bold">
        Upload Documents
        </p>
        <div class="row">
            <div class="col-md-2">
            <div class="form-group">
                <label class="active">Document Name</label>
                <input type="text"  class="form-control" name="docs_name[]" placeholder="Document Name">
                <input type="file"  class="form-control" name="docs[]">
            </div>
    
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="active">Document Name</label>
                <input type="text"  class="form-control" name="docs_name[]" placeholder="Document Name">
                <input type="file"  class="form-control" name="docs[]">
            </div>
    
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="active">Document Name</label>
                <input type="text"  class="form-control" name="docs_name[]" placeholder="Document Name">
                <input type="file"  class="form-control" name="docs[]">
            </div>
    
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="active">Document Name</label>
                <input type="text"  class="form-control" name="docs_name[]" placeholder="Document Name">
                <input type="file"  class="form-control" name="docs[]">
            </div>
    
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="active">Document Name</label>
                <input type="text"  class="form-control" name="docs_name[]" placeholder="Document Name">
                <input type="file"  class="form-control" name="docs[]">
            </div>
    
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="active">Document Name</label>
                <input type="text"  class="form-control" name="docs_name[]" placeholder="Document Name">
                <input type="file"  class="form-control" name="docs[]">
            </div>
    
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </main>@endsection













