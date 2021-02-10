@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hostel Requests Management</h1>
{{--            <a href="/hostels/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New Hostel</a>--}}
        </div>
        @if($hostelrequests !== null)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listing of all Hostel Requests</h6>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">From</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hostelrequests as $hostelrequest)
                        <tr>
                            <th scope="row">{{$hostelrequest->id}}</th>
                            <td>{{ $hostelrequest->user->name }}</td>
                            <td>{{date('d-m-y', strtotime($hostelrequest->created_at))}}</td>
                            <td>
                                @if($hostelrequest->status == 'pending')
                                    <span class="text-primary"><em>Pending!</em></span>
                                @elseif($hostelrequest->status == 'approved')
                                    <span class="text-success">Approved</span>
                                @else
                                    <span class="text-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                <a href="/request/{{$hostelrequest->id}}/edit" ><i class="fas fa-edit"></i> Update</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h5>There are no any requests at the moment!</h5>
            @endif

    </div>
@endsection
