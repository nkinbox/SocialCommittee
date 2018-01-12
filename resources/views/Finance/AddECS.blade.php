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
New ECS
@if(!empty($member))
{{$member}}

<form action="{{route('addECS')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<input type="hidden" name="member_id" value="{{$member->member_id}}">
<select name="bank_id">
    @if(count($banks)>0)
    @foreach($banks as $bank)
    <option value="{{$bank->bank_id}}">Use {{ $bank->bank_name }}</option>
    @endforeach
    @endif
    <option value="">Add New Bank</option>
</select>
<input type="text" name="acc_no" placeholder="Acc Number" value="{{ old('acc_no') }}">
<input type="text" name="ifsc_code" placeholder="ifsc_code"  value="{{ old('ifsc_code') }}">
<input type="text" name="bank_name" placeholder="bank_name" value="{{ old('bank_name') }}">
<input type="text" name="branch_name" placeholder="branch_name" value="{{ old('branch_name') }}">
<br>
<br>
<select name="payment_for">
    <option value="mf">Membership Fees</option>
    <option value="lr">Loan Repayment</option>
</select>
<input type="text" name="valid_from" placeholder="valid_from" value="{{ old('valid_from') }}">
<input type="text" name="valid_till" placeholder="valid_till"  value="{{ old('valid_till') }}">

<div>
    <div>
    <input type="text" name="docs_name[]" placeholder="Document Name">
    <input type="file" name="docs[]">
    </div>
    <div>
    <input type="text" name="docs_name[]" placeholder="Document Name">
    <input type="file" name="docs[]">
    </div>
    <div>
    <input type="text" name="docs_name[]" placeholder="Document Name">
    <input type="file" name="docs[]">
    </div>
    <div>
    <input type="text" name="docs_name[]" placeholder="Document Name">
    <input type="file" name="docs[]">
    </div>
    <div>
    <input type="text" name="docs_name[]" placeholder="Document Name">
    <input type="file" name="docs[]">
    </div>
</div>
<button>Submit</button>

</form>
@else
No Member selected for New ECS
@endif
@endsection
