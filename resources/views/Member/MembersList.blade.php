@extends('layouts.app')

@section('content')

<main class="main-content p-4 invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="600" role="main">
      <div class="row">
        <!-- <div class="col-md-12">
          <h1>Tables</h1>
        </div> -->
      </div>
      <div class="row mb-4">
        <div class="col-md-12">
          @if (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
          @endif
          <div class="card">
            <div class="card-body">
                <div class="col-lg-12 pb-5">
                  <h2>Member List</h2>
                  @if(!empty($members) && count($members) > 0)
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name Of Member</th>
                        <th>Father/Husband Name</th>
                        <th>Designation</th>
                        <th>HQ</th>
                        <th>Railway Id</th>
                        <th>Member Since</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;?>
                      @foreach($members as $member)
                      <tr>
                        <th scope="row"><?php echo $i; $i++;?></th>
                        <td>{{$member->first_name . ' ' . $member->last_name}}</td>
                        <td>{{$member->father_husband_name}}</td>
                        <td>{{$member->designation}}</td>
                        <td>{{$member->hq}}</td>
                        <td>{{$member->railway_id}}</td>
                        <td>{{date('d-M-y', strtotime($member->approved_on)) }}</td>
                        <td>
                            <a href="{{ route('memberProfile', ['id' => $member->member_id]) }}">View Profile</a>
                            <a href="{{ route('showMember', ['id' => $member->member_id]) }}">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $members->links() }}
                  @else
                  <p>No Pending Approvals</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection