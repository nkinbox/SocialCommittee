@extends('layouts.app')
@section('content')
@if(!empty($banks))
@foreach($banks as $bank)
<div><a href="{{ route('editBankForm', ['bank_id' => $bank->bank_id]) }}">Edit</a>
    <br>{{$bank}}</div><br>
@endforeach
@else
No Bank Details
@endif
@endsection