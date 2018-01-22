@extends('layouts.app')
@section('content')
@if(!empty($fees) && count($fees) > 0)
@foreach($fees as $fees_)
{{ $fees_ }}<br><br>
@endforeach
{{ $fees->links() }}
@else
All Fees are Approved
@endif
@endsection
