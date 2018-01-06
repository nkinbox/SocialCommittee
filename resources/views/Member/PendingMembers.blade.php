@extends('layouts.app')

@section('content')

@if(!empty($members))
@foreach($members as $member)
<div>
<h1>{{$member->first_name . ' ' . $member->last_name}}</h1>
<div><a href="{{ route('showMember', ['id' => $member->member_id]) }}">View</a></div>
{{$member}}
</div>
@endforeach
{{ $members->links()}}
@else
<p>No Members to show</p>
@endif
@endsection