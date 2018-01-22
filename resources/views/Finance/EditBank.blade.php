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
Edit Bank
@if(!empty($bankDetails))
{{$bankDetails->member->first_name}}

<form action="{{route('editBank')}}" method="post">
        {{ csrf_field() }}
    <input type="hidden" name="bank_id" value="{{$bankDetails->bank_id}}">
    <input type="text" name="acc_no" placeholder="Acc Number" value="{{ old('acc_no', $bankDetails->acc_no) }}">
    <input type="text" name="ifsc_code" placeholder="ifsc_code"  value="{{ old('ifsc_code', $bankDetails->ifsc_code) }}">
    <input type="text" name="bank_name" placeholder="bank_name" value="{{ old('bank_name', $bankDetails->bank_name) }}">
    <input type="text" name="branch_name" placeholder="branch_name" value="{{ old('branch_name', $bankDetails->branch_name) }}">
    <input type="hidden" name="_method" value="PUT">
    <button>Submit</button>
</form>
@else
No Member selected for New Bank
@endif
@endsection
