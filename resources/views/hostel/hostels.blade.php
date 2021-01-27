@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hostels Management</h1>
            <a href="/hostels/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New Hostel</a>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listing of all Hostels</h6>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Capacity</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hostels as $hostel)
                                <tr>
                                    <th scope="row">{{$hostel->id}}</th>
                                    <td>{{ $hostel->name }}</td>
                                    <td>
                                        @if($hostel->gender == 'm')
                                            <i class="fas fa-male text-primary"></i> Men's Hostel

                                        @else
                                            <i class="fas fa-female text-primary"></i> Women's Hostel

                                        @endif
                                    </td>
                                    <td>
                                        @if($hostel->capacity == 'full')
                                            <span class="text-danger">Full!</span>
                                        @else
                                            <span class="text-success">Free</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="hostels/{{ $hostel->id }}/edit"><i class="fas fa-edit"></i></a>
                                        {{--<a href="" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>--}}
                                        <a class="" href="/hostels/{{ $hostel->id }}"
                                           onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                        <form id="delete-form" action="/hostels/{{ $hostel->id }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
