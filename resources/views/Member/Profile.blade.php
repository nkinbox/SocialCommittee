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
                    @else
                    <p>No Members to show</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection