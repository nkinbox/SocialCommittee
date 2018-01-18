@extends('layouts.app')
@section('content')
@if(!empty($ecs))
<div><a href="{{ route('viewECS', ['ecs_id' => $ecs->ecs_id]) }}">View</a>
    <a href="{{ route('editECSForm', ['ecs_id' => $ecs->ecs_id]) }}">Edit</a>
    <form action="{{route('deleteECS')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="ecs_id" value="{{$ecs->ecs_id}}">
        <input type="hidden" name="_method" value="PUT">
        <button>Make Inactive</button>
    </form>
    <br>{{$ecs}}</div><br>
@else
No ECS to show
@endif
@endsection