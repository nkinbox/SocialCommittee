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
@if(!empty($fees))
   
<form action="{{route('ClientSidePayment')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>{{$fees}}<br>
    <input type="hidden" name="fees_id" value="{{ $fees->fees_id }}">
    <select name="pay_method">
        <option value="cas"{{ (old('pay_method', $fees->pay_method) == "cas") ? ' selected' : '' }}>Cash</option>
        <option value="trf"{{ (old('pay_method', $fees->pay_method) == "trf") ? ' selected' : ''}}>Bank Transfer or Cash Deposit</option>
        <option value="chq"{{ (old('pay_method', $fees->pay_method) == "chq") ? ' selected' : ''}}>Cheque</option>
        <option value="oln"{{ (old('pay_method', $fees->pay_method) == "oln") ? ' selected' : ''}}>Online Payment</option>
    </select>
    <input type="text" name="bank_name" placeholder="bank_name">
    <input type="text" name="cheque_no" placeholder="cheque_no">
    <div>
    <input type="file" name="receipt">
    </div>
    <button>Submit</button>
</form>
    <div>
        Please Give Cash to your lobby Head
    </div>
@else
No Pending Fees or Payment is auto scheduled
@endif
@endsection
