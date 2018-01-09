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
add Nominee
<form action="{{route('addNominee')}}" method="post">
        {{ csrf_field() }}
<input type="hidden" name="member_id" value="{{$member_id}}">
<select name="salutation">
    <option>Mr.</option>
    <option>Ms.</option>
    <option>Mrs.</option>
</select>
<input type="text" name="first_name" placeholder="first_name"  value="{{ old('first_name') }}">
<input type="text" name="last_name" placeholder="last_name" value="{{ old('last_name') }}">
<input type="text" name="email" placeholder="email" value="{{ old('email') }}">
<input type="text" name="relationship" placeholder="relationship" value="{{ old('relationship') }}">
<input type="text" name="mobile_no" placeholder="mobile_no" value="{{ old('mobile_no') }}">
<input type="text" name="altmobile_no" placeholder="altmobile_no" value="{{ old('altmobile_no') }}">
<input type="text" name="address" placeholder="address" value="{{ old('address') }}">
<button>Submit</button>

</form>
@endsection
