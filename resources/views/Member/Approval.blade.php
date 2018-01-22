@extends('layouts.app')

@section('content')
<main class="main-content p-4 invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="600" role="main">
      <div class="row">
      </div>
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
                <div class="col-lg-12 pb-5">
                  @if(!empty($member))
                  <h2 style="float:right"><small>applied: </small>{{date('d-M-y', strtotime($member->applied_on))}}</h2>
                  <h2>{{$member->salutation. ' ' .$member->first_name . ' ' . $member->last_name}}</h2>
                  <div class="row">
                    <div class="col-md-4">
                      <img src="{{ asset('public/photograph/' . $member->image_name) }}" style="width:100px">
                    </div>
                    <div class="col-md-8">
                      <a href="{{ route('editMemberForm', ['id' => $member->member_id]) }}">Approve/Reject</a>
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>{{$member->salutation. ' ' .$member->first_name . ' ' . $member->last_name}}</td>
                            <td>({{$member->designation}})</td>
                            <td>{{$member->hq}}</td>
                          </tr>
                          <tr>
                            <td>Father/Husband: {{$member->father_husband_name}}</td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>RailwayId: {{$member->railway_id}}</td>
                            <td>VoterId: {{$member->voter_id}}</td>
                            <td>Aadhar: {{$member->aadhar_no}}</td>
                          </tr>
                          <tr>
                            <td>PAN: {{$member->pancard_no}}</td>
                            <td>Mob: {{$member->mobile_no}}</td>
                            <td>{{$member->altmobile_no}}</td>
                          </tr>
                          <tr>
                            <td>PF: {{$member->pf_no}}</td>
                            <td></td>
                            <td>DOB: {{date('d-M-y',strtotime($member->dob))}}</td>
                          </tr>
                          <tr>
                            <td>{{$member->email}}</td>
                            <td>DOA: {{date('d-M-y',strtotime($member->doa))}}</td>
                            <td>DOR: {{date('d-M-y',strtotime($member->dor))}}</td>
                          </tr>
                          <tr>
                            <td>Current Address: {{$member->current_address}}</td>
                          </tr>
                          <tr>
                            <td>Permanent Address: {{$member->permanent_address}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <hr>
                  <h2>Nominee Details</h2>
                  @if(count($nominees) > 0)
                  @foreach($nominees as $nominee)
                  <div>
                    <div class="col-md-4">
                      <img src="{{ asset('public/photograph/' . $nominee->image_name) }}" style="width:100px">
                    </div>
                    <div class="col-md-8">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>{{$nominee->salutation . ' ' . $nominee->first_name . ' ' . $nominee->last_name}}</td>
                            <td>{{$nominee->relationship}}</td>
                            <td>{{$nominee->email}}</td>
                          </tr>
                          <tr>
                            <td>{{$nominee->mobile_no}}</td>
                            <td></td>
                            <td>{{$nominee->altmobile_no}}</td>
                          </tr>
                          <tr>
                            <td>{{$nominee->address}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  </div>
                  @endforeach
                  @else
                  <p>No Nominee.</p>
                  @endif
                  @if(count($profile_docs) > 0)
                  <hr>
                  <h2>Documents</h2>
                  <div class="row">
                  @foreach($profile_docs as $doc)
                   <div class="col-md-4">
                     <div class="thumbnail">
                       <a href="{{ asset('public/documents/' . $doc->file_name) }}" target="_blank">
                         <img src="{{ asset('public/documents/' . $doc->file_name) }}" alt="#" style="width:100%">
                         <div class="caption">
                           <p style="text-align:center"><b>{{ $doc->document_name }}</b></p>
                         </div>
                       </a>
                     </div>
                   </div>
                  @endforeach
                  </div>
                  @else
                  <p>No Documents</p>
                  @endif
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
