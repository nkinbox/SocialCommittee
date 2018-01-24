@extends('layouts.app')
@section('content')
@if(!empty($ecs))
<div><a href="{{ route('viewECS', ['ecs_id' => $ecs->ecs_id]) }}">View</a>
    <a href="{{ route('editECSForm', ['ecs_id' => $ecs->ecs_id]) }}">Edit</a>
    <form action="{{route('deleteECS')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="ecs_id" value="{{$ecs->ecs_id}}">
        <input type="hidden" name="_method" value="PUT">
        <button>Make Inactive</button>
    </form>
    <br>{{$ecs}}</div><br>
@else
No ECS to show
@endif




<main class="main-content p-4 invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="600" role="main">
<div class="row">
<div class="col-md-12">
    <h1>ECS Details</h1>
</div>
</div>
<div class="row mb-4">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 pb-5">
                    @if(!empty($ecs))
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Name</b>
                                </td>
                                <td>
                                    {{ $ecs->member->first_name . ' ' .$ecs->member->last_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Membership No.</b>
                                </td>
                                <td>
                                    {{ $ecs->member->membership_no}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Used for</b>
                                </td>
                                @if($ecs->payment_for == "mf")
                                <td>Membership Payment</td>
                                @else
                                <td>Loan Repayment</td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <b>Bank Name</b>
                                </td>
                                <td>
                                    {{$ecs->bank->bank_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>IFSC Code</b>
                                </td>
                                <td>
                                    {{$ecs->bank->ifsc_code}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Account No.</b>
                                </td>
                                <td>
                                    {{$ecs->bank->acc_no}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Valid From</b>
                                </td>
                                <td>
                                    {{date('d-M-Y', strtotime($ecs->valid_from))}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Valid Till</b>
                                </td>
                                <td>
                                    {{date('d-M-Y', strtotime($ecs->valid_till))}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                    @if(count($ecs->documents) > 0)
                    <hr>
                    <h2>Documents</h2>
                    <div class="row">
                    @foreach($ecs->documents as $doc)
                        <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="{{ asset('public/documents/' . $doc->file_name) }}" target="_blank">
                            <img src="{{ asset('public/documents/' . $doc->file_name) }}" alt="#" style="width:100%">
                            <div class="caption">
                                <p style="text-align:center"><b>{{ $doc->document_name }}</b></p>
                            </div>
                            </a>
                        </div>
                        </div>
                    @endforeach
                    </div>
                    @else
                    <p>No Documents</p>
                    @endif
                    </div>
                    @else
                    <div>No ECS to show</div>
                    @endif         
                </div>	
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection