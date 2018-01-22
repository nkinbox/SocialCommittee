@extends('layouts.app')
@section('content')
<div>
<a href="{{ route(request()->route()->getName()) }}">Show All</a>
<a href="{{ route(request()->route()->getName(), ['only' => 1]) }}">Only Cheque</a>
<a href="{{ route(request()->route()->getName(), ['only' => 2]) }}">Only (Receipts, Bank Transfer)</a>
</div>
@if(!empty($fees) && count($fees) > 0)
@foreach($fees as $fees_)
<form action="{{ route('MFStatus') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="fees_id" value="{{ $fees_->fees_id }}">
    <select name="status">
        <option value="received">Mark received</option>
        <option value="reject">Rejected, Pay Again</option>
    </select>
    <button>Submit</button>
</form>
{{ $fees_ }}<br><br>
@endforeach
{{ $fees->links() }}
@else
All Fees are Approved
@endif
@endsection
