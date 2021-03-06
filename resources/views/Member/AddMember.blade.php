@extends('layouts.app')
@section('content')
<main class="main-content p-4 invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="600" role="main">
<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center">Admission Form</h1>
    </div>
</div>
<div class="row mb-4">
<div class="col-md-12">
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
                <p class="lead" style="font-weight: bold">
                    Member Details
                </p>
                <form  action="{{route('addMember')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="salutation" class="active">Salutation</label>
                            <select id="salutation" name="salutation" class="form-control">
                                <option{{ (old('salutation') == "Mr.") ? ' selected' : '' }}>Mr.</option>
                                <option{{ (old('salutation') == "Ms.") ? ' selected' : '' }}>Ms.</option>
                                <option{{ (old('salutation') == "Mrs.") ? ' selected' : '' }}>Mrs.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="first_name" class="active">First Name</label>
                            <input id="first_name" class="form-control" type="text" name="first_name" placeholder="first_name"  value="{{ old('first_name') }}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="last_name" class="active">Last Name</label>
                            <input id="last_name" type="text" name="last_name" class="form-control" placeholder="last_name" value="{{ old('last_name') }}">
                        </div>
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="fhname" class="active">Father's/Husband Name</label>
                        <input id="fhname" type="text" class="form-control" name="father_husband_name" placeholder="father or husband name" value="{{ old('father_husband_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="active">EmailID</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="designation" class="active">Designation</label>
                        <input id="designation" type="text"  class="form-control" name="designation" placeholder="designation" value="{{ old('designation') }}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="hq" class="active">HQ</label>
                        <input id="hq" type="text" class="form-control" name="hq" placeholder="hq" value="{{ old('hq') }}">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="Address" class="active">Current Address</label>
                        <input id="Address" type="text" class="form-control" name="current_address" placeholder="current_address" value="{{ old('current_address') }}">
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="dob" class="active">D.O.B</label>
                        <input id="dob" type="text" class="form-control" name="dob" placeholder="dob" value="{{ old('dob') }}">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="doa" class="active">D.O.A</label>
                        <input id="doa" type="text" class="form-control" name="doa" placeholder="doa" value="{{ old('doa') }}">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="dor" class="active">D.O.R</label>
                        <input id="dor" type="text" class="form-control" name="dor" placeholder="dor" value="{{ old('dor') }}">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="PAddress" class="active">Permanent Address</label>
                        <input id="PAddress" type="text" class="form-control" name="permanent_address" placeholder="permanent_address" value="{{ old('permanent_address') }}">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <label for="mobile" class="active">Mobile Number</label>
                          <input id="mobile" type="text" class="form-control" name="mobile_no" placeholder="mobile_no" value="{{ old('mobile_no') }}">
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <label for="altmobile" class="active">Alt Mobile Number</label>
                          <input id="altmobile" type="text" class="form-control" name="altmobile_no" placeholder="altmobile_no" value="{{ old('altmobile_no') }}">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                        <label for="bankac" class="active">Bank A/c Number</label>
                        <input id="bankac" type="text" class="form-control" name="acc_no" placeholder="Acc Number" value="{{ old('acc_no') }}">
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                        <label for="bankifsc" class="active">IFSC Code</label>
                        <input id="bankifsc" type="text" class="form-control" name="ifsc_code" placeholder="ifsc_code"  value="{{ old('ifsc_code') }}">
                    </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bankname" class="active">Bank Name</label>
                        <input id="bankname" type="text" class="form-control" name="bank_name" placeholder="bank_name" value="{{ old('bank_name') }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="branch" class="active">Branch Name</label>
                        <input id="branch" type="text" class="form-control" name="branch_name" placeholder="branch_name" value="{{ old('branch_name') }}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="pan" class="active">PAN Card Number</label>
                        <input id="pan" type="text" class="form-control" name="pancard_no" placeholder="pancard_no" value="{{ old('pancard_no') }}">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="vid" class="active">Voter Id No</label>
                        <input id="vid" type="text" class="form-control" name="voter_id" placeholder="voter_id" value="{{ old('voter_id') }}">
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="ano" class="active">Aadhar No</label>
                          <input id="ano" type="text" class="form-control" name="aadhar_no" placeholder="aadhar_no" value="{{ old('aadhar_no') }}">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="rid" class="active">Railway Id No</label>
                    <input id="rid" type="text" class="form-control" name="railway_id" placeholder="railway_id" value="{{ old('railway_id') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="Introduce" class="active">Introduce Number</label>
                        <input id="Introduce" type="text" class="form-control" name="introduced_by" placeholder="referral_Membership no" value="{{ old('introduced_by') }}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="pfno" class="active">P.F. No</label>
                        <input id="pfno" type="text" class="form-control" name="pf_no" placeholder="pf_no" value="{{ old('pf_no') }}">
                        </div>
                        </div>
                    </div>
                    <hr style="border:1px solid #122f3b">
                    <p class="lead" style="font-weight: bold">
                    Nominee Details
                    </p>
                    <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                              <label for="nsalutation" class="active">Salutation</label>
                              <select id="nsalutation" name="nsalutation" class="form-control">
                                  <option{{ (old('nsalutation') == "Mr.") ? ' selected' : '' }}>Mr.</option>
                                  <option{{ (old('nsalutation') == "Ms.") ? ' selected' : '' }}>Ms.</option>
                                  <option{{ (old('nsalutation') == "Mrs.") ? ' selected' : '' }}>Mrs.</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <label for="nfirst_name" class="active">Nominee First Name</label>
                              <input id="nfirst_name" class="form-control" type="text" name="nfirst_name" placeholder="first_name"  value="{{ old('nfirst_name') }}">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <label for="nlast_name" class="active">Nominee Last Name</label>
                              <input id="nlast_name" type="text" name="nlast_name" class="form-control" placeholder="last_name" value="{{ old('nlast_name') }}">
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nemail" class="active">Nominee EmailID</label>
                        <input id="nemail" type="email" class="form-control" name="nemail" placeholder="email" value="{{ old('nemail') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                        <label for="relationship" class="active">Relationship With Nominee</label>
                        <input id="relationship" type="text" class="form-control" name="relationship" placeholder="relationship" value="{{ old('relationship') }}">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                        <label for="phnominee" class="active">Phone No Nominee</label>
                        <input id="phnominee" type="text" class="form-control" name="nmobile_no" placeholder="mobile_no" value="{{ old('nmobile_no') }}">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                        <label for="altphnominee" class="active">Alt. Phone No Nominee</label>
                        <input id="altphnominee" type="text" class="form-control" name="naltmobile_no" placeholder="mobile_no" value="{{ old('naltmobile_no') }}">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nAddress" class="active"> Nominee Address</label>
                        <input id="nAddress" type="text" class="form-control" name="naddress" placeholder="address" value="{{ old('naddress') }}">
                    </div>
                    <br>
                    <div class="row"><div class="col-md-3 col-md-offset-3"></div>
                        <div class="col-md-3 ">
                            <img class="profile-pic" style="position: absolute;" src="" />
                            <div class="upload-button">Affix Applicant<br> Recent Passport<br> Size Photograph</div>
                            <input name="photograph" class="file-upload" type="file" accept="image/*"/>
                        </div>
                        <div class="col-md-3 ">
                            <img class="profile-pic1" style="position: absolute;" src="" />
                            <div class="upload-button1">Affix Nominee<br> Recent Passport<br> Size Photograph</div>
                            <input name="nphotograph" class="file-upload1" type="file" accept="image/*"/>
                        </div>
                    </div>
                    <!-- <hr style="border:3px solid #122f3b"> -->
                    <br>
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

</main>


</div>
<div class="row mb-4">
    <div class="col-md-12">

    </div>
</div>
</main>
@endsection
