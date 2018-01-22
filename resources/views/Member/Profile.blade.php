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
                  <h2>{{$member->first_name . ' ' . $member->last_name}}</h2>
                  <img src="{{ asset('public/photograph/' . $member->image_name) }}" style="width:100px">
                  <a href="{{ route('editMemberForm', ['id' => $member->member_id]) }}">Edit</a>
                  <a href="{{ route('addECSForm', ['member_id' => $member->member_id]) }}">Add ECS</a><br>
                  <a href="{{ route('addBankForm', ['member_id' => $member->member_id]) }}">Add Bank</a><br>
                  <div><a href="{{ route('addNomineeForm', ['member_id' => $member->member_id]) }}">Add Nominee</a></div>

                  @if(count($nominees) > 0)
                  @foreach($nominees as $nominee)
                  <div>{{$nominee}}</div>
                  <div><a href="{{ route('editNomineeForm', ['nominee_id' => $nominee->nominee_id]) }}">Edit</a></div>
                  <div>
                      <form action="{{ route('deleteNominee') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="nominee_id" value="{{ $nominee->nominee_id }}">
                          <input type="hidden" name="_method" value="delete">
                          <button>Delete</button>
                      </form>
                  </div>
                  @endforeach
                  @else
                  <p>No Nominee.</p>
                  @endif
                  @if(count($profile_docs) > 0)
                  @foreach($profile_docs as $doc)
                  <div>{{ $doc->document_name }}</div>
                  <img src="{{ asset('storage/documents/' . $doc->file_name) }}" style="width: 300px;">
                  @endforeach
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
