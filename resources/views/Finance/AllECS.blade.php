@extends('layouts.app')
@section('content')
<main class="main-content p-4 invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="600" role="main">
<div class="row">
<div class="col-md-12">
    <h1>All Active ECS Details</h1>
</div>
</div>
<div class="row mb-4">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 pb-5">
                    @if(!empty($all_ecs))
                    <table class="table table-responsive" id="example" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Membership No</th>
                                <th>Used For</th>
                                <th>Bank Name</th>
                                <th>IFSC Code</th>
                                <th>Account Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        @foreach($all_ecs as $ecs)
                            <tr>
                                <td><?php $i++; echo $i;?></td>
                                <td>{{ $ecs->member->first_name . ' ' .$ecs->member->last_name}}</td>
                                <td>{{ $ecs->member->membership_no}}</td>
                                @if($ecs->payment_for == "mf")
                                <td>Membership Payment</td>
                                @else
                                <td>Loan Repayment</td>
                                @endif
                                <td>{{$ecs->bank->bank_name}}</td>
                                <td>{{$ecs->bank->ifsc_code}}</td>
                                <td>{{$ecs->bank->acc_no}}</td>
                                <td><a href="{{ route('viewECS', ['ecs_id' => $ecs->ecs_id]) }}">View</a>/
                                    <a href="{{ route('editECSForm', ['ecs_id' => $ecs->ecs_id]) }}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div>No Active ECS</div>
                    @endif         
                </div>	
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection
