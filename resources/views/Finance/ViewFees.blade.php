@extends('layouts.app')
@section('content')
<a href="{{ route('MembershipFeesPayment') }}">Pay Pending Fees Now</a>
@if(!empty($all_fees))
@foreach($all_fees as $fees)
<div><a href="{{ route('MembershipFeesStatement', ['fees_id' => $fees->fees_id]) }}">View Statement</a>
    <br>{{$fees}}</div><br>
@endforeach
@else
No ECS to show
@endif
@endsection
