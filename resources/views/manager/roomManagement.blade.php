@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hostel Members Management</h1>
            {{--            <a href="/hostels/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New Hostel</a>--}}
        </div>
        @if($rooms !== null)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listing of all Hostel Members with Approved Requests</h6>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Room No.</th>
                        <th scope="col">Hostel Name</th>
                        <th scope="col">Total Room Members</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <th scope="row">{{$room->id}}</th>
                            <td>{{ $room->room_number }}</td>
                            <td>{{ $room->hostel->name }}</td>
                            <td>{{$room->users->count()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h5>There are no members that requested for this hostel yet!</h5>
            @endif

    </div>
@endsection
