@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Approved Hostel Requests Management</h1>
            {{--            <a href="/hostels/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New Hostel</a>--}}
        </div>
        @if($approved !== null)
        <div class="row justify-content-center">
            <div class="col">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listing of all Approved Hostel Requests</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive-lg">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Member name</th>
                            <th scope="col">Requested On</th>
                            <th scope="col">Room Status</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($approved as $request)
                            <tr>
                                <th scope="row">{{$request->id}}</th>
                                <td>{{ $request->user->name }}</td>
                                <td>{{date('d-m-y', strtotime($request->updated_at))}}</td>
                                <td>
                                    @if($request->user->room_id !== null)
                                        <span class="text-success">Assigned Room {{$request->user->room->room_number}}</span>
                                    @else
                                        <span class="text-danger"><em>Not Assigned!</em></span>
                                    @endif
                                </td>
                                <td>
                                    @if($request->user->room_id == null)
                                        <a href="/userroom/{{$request->user->id}}/edit" ><i class="fas fa-edit"></i> Assign Room</a>
                                    @else
                                        <a href="/userroom/{{$request->user->id}}/edit" ><i class="fas fa-edit"></i> Update Room</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        @else
            <h5>There are no any Approved requests at the moment!</h5>
        @endif

    </div>
@endsection
