@extends('layouts.master')

@section('content')
    <div class="cotainer-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Administrator Dashboard</h1>
        </div>

        <div class="row">
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Number of Hostels</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allhostels->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hotel fa-2x text-gray-300"></i>
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
                                    Available Hostels</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allfreehostels->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
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
                                    Total Hostel Members</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hostelusers->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Hostel Managers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $managers->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hostel Managers Summary</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Hostel</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($managers as $manager)
                                <tr>
                                    <th scope="row">{{$manager->id}}</th>
                                    <td>{{ $manager->name }}</td>
                                    <td>
                                        @if($manager->gender == 'm')
                                            <i class="fas fa-male text-primary"></i> Male

                                        @else
                                            <i class="fas fa-female text-primary"></i> Female

                                        @endif
                                    </td>
                                    <td>{{ $manager->hostel->name }}</td>
                                    <td>
                                        <a href="hostel/edit"><i class="fas fa-edit"></i></a>
                                        <a href="hostel/edit"><i class="fas fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    </div>

@endsection
