@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!--div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Links</h1>
                    <div><a href="{{route('addMemberForm')}}">Add Member</a></div>
                    <div><a href="{{route('pendingApproval')}}">Pending Approvals</a></div>
                    <div><a href="{{route('AllMemberList')}}">All Member List</a></div>
                    <div><a href="{{route('LobbyMemberList')}}">Lobby Member List</a></div>
                    <div><a href="{{route('allECS')}}">All ECS</a></div>
                    <div><a href="{{route('myBankDetails')}}">My Bank Details</a></div>
                    <div><a href="{{route('MembershipFeesHistory')}}">Membership payment History</a></div>
                    <div><a href="{{route('AllMembershipFeesList')}}">All Membership Fees List</a></div>
                    <div><a href="{{route('LobbyMembershipFeesList')}}">My Lobby Membership Fees List</a></div>
                    <div><a href="{{route('AllMembershipFeesDefaultersList')}}">All Membership Fees Defaulters List</a></div>
                    <div><a href="{{route('LobbyMembershipFeesDefaultersList')}}">My Lobby Membership Fees Defaulters List</a></div>
                    
                </div>
            </div>
        </div>
    </div-->
</div>
@endsection
