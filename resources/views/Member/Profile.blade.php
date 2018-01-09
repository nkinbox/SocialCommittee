@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(!empty($member))
                    <div>
                    <h1>{{$member->first_name . ' ' . $member->last_name}}</h1>
                    <a href="{{ route('editMemberForm', ['id' => $member->member_id]) }}">Edit</a>
                    {{$member}}
                    </div>
                    <div>
                        <h2>Nominee</h2>
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
                            
                        @endforeach
                        @else
                        <p>No Nominee.</p>
                        @endif
                    </div>
                    @else
                    <p>No Members to show</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection