@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
Add Bank
@if(!empty($member))
{{$member}}

<form action="{{route('addBank')}}" method="post">
        {{ csrf_field() }}
<input type="hidden" name="member_id" value="{{$member->member_id}}">
<input type="text" name="acc_no" placeholder="Acc Number" value="{{ old('acc_no') }}">
<input type="text" name="ifsc_code" placeholder="ifsc_code"  value="{{ old('ifsc_code') }}">
<input type="text" name="bank_name" placeholder="bank_name" value="{{ old('bank_name') }}">
<input type="text" name="branch_name" placeholder="branch_name" value="{{ old('branch_name') }}">
<button>Submit</button>
</form>
@else
No Member selected for New Bank
@endif
@endsection
