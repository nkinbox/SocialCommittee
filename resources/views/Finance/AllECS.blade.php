@extends('layouts.app')
@section('content')
@if(!empty($all_ecs))
@foreach($all_ecs as $ecs)
<div><a href="{{ route('viewECS', ['ecs_id' => $ecs->ecs_id]) }}">View</a>
    <a href="{{ route('editECSForm', ['ecs_id' => $ecs->ecs_id]) }}">Edit</a>
    <br>{{$ecs}}</div><br>
@endforeach
@else
No ECS to show
@endif
@endsection
