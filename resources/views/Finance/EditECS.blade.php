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
Edit ECS
@if(!empty($ecs))

<form action="{{route('editECS')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<input type="hidden" name="ecs_id" value="{{$ecs->ecs_id}}">
<select name="payment_for">
    <option value="mf"{{ (old('payment_for', $ecs->payment_for) == "mf") ? ' selected' : '' }}>Membership Fees</option>
    <option value="lr"{{ (old('payment_for', $ecs->payment_for) == "lr") ? ' selected' : '' }}>Loan Repayment</option>
</select>
<input type="text" name="valid_from" placeholder="valid_from" value="{{ old('valid_from', date('Y-m-d', strtotime($ecs->valid_till))) }}">
<input type="text" name="valid_till" placeholder="valid_till"  value="{{ old('valid_till', date('Y-m-d', strtotime($ecs->valid_till))) }}">

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
@endif
</form>
@endsection
