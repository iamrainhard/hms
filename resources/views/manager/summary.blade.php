@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manager Dashboard</h1>
        </div>

        @if($managerhostel !== null)
        <div class="row">
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingrequests->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Hostel Name</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $managerhostel->name }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Members</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $members->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            {{--<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hostel Members Summary</h6>
                        </div>
                        <div class="card-body">
                            @if($members !== null)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Room</th>
{{--                                    <th scope="col">Edit</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <th scope="row">{{$member->id}}</th>
                                        <td>{{ $member->name }}</td>
                                        <td>
                                            @if($member->gender == 'm')
                                                <i class="fas fa-male text-primary"></i> Male

                                            @else
                                                <i class="fas fa-female text-primary"></i> Female
                                            @endif
                                        </td>
                                        <td>Room {{ $member->room->room_number }}</td>
                                        {{--<td>
                                            <a href="hostel/edit"><i class="fas fa-edit"></i></a>
                                            <a href="hostel/edit"><i class="fas fa-trash text-danger"></i></a>
                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                            <h5 class="text-danger">Your Hostel Has no Members Yet!</h5>
                                @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Personal Details Summary</h6>
                        </div>
                        <div class="card-body">
                            <h5 class="text-dark">Name:</h5>
                            <p class="text-info text-capitalize">{{ Auth::user()->name }}</p>
                            <h5 class="text-dark">Email:</h5>
                            <p class="text-info">{{ Auth::user()->email }}</p>
                            <h5 class="text-dark">Role:</h5>
                            <p class="text-info text-capitalize">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <h5 class="text-danger">You are not a Hostel manager or You have not been assigned any Hostel yet! Please contact the Administrator.!</h5>
            @endif
    </div>
@endsection
