@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-success">User Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">

                            @if($userrequest !== null)
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#requestCard" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="requestCard">
                                        <h6 class="m-0 font-weight-bold text-primary">Your Request</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapsed" id="requestCard" style="">
                                        <div class="card-body">
                                            <h5 class="text-dark">Your Hostel Request:</h5>
                                            <p>{{$userrequest->hostel->name}}</p>
                                            <h5 class="text-dark">Status of Request:</h5>
                                            <p>
                                                @if($userrequest->status == 'pending')
                                                    <span class="badge badge-primary text-capitalize">
                                                        <i class="fas fa-circle-notch"></i>
                                                        {{$userrequest->status}}</span>
                                                @elseif($userrequest->status == 'approved')
                                                    <span class="badge badge-success text-capitalize">
                                                        <i class="fas fa-circle"></i>
                                                        {{$userrequest->status}}</span>
                                                @else
                                                    <span class="badge badge-danger text-capitalize">
                                                        <i class="fas fa-times-circle"></i>
                                                        {{$userrequest->status}}</span>
                                                    @endif

                                            </p>
                                            <h5 class="text-dark">Date of Request:</h5>
                                            <p>{{date('d-m-y', strtotime($userrequest->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <p class="text-info">You don't have any request. Please send a room request first!</p>
                                    <a href="/request" class="btn btn-primary">Send a Request</a>
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            @if($userhostel !== null)
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#hostelCard" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="hostelCard">
                                        <h6 class="m-0 font-weight-bold text-primary">Hostel details</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapsed" id="hostelCard" style="">
                                        <div class="card-body">
                                            <h5 class="text-dark">Your Approved Hostel Is:</h5>
                                            <p>{{$userhostel->name}}</p>
                                            @if($userroom !== null)
                                                <h5 class="text-dark">Your Assigned Room Is:</h5>
                                                <p>Room {{$userroom->room_number}}</p>
                                            @else
                                            <h6 class="text-danger">You have not been assigned a Room yet! Please be patient.</h6>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
