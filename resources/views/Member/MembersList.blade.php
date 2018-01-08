@extends('layouts.app')

@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
@if(!empty($members) && count($members) > 0)
@foreach($members as $member)
<div>
<h1>{{$member->first_name . ' ' . $member->last_name}}</h1>
<div><a href="{{ route('showMember', ['id' => $member->member_id]) }}">Edit</a></div>

<div><a href="{{ route('memberProfile', ['id' => $member->member_id]) }}">View</a></div>

{{$member}}
</div>
@endforeach
{{ $members->links()}}
@else
<p>No Members to show</p>
@endif
@endsection