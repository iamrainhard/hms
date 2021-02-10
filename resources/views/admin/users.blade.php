@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listing of all Users</h6>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->gender == 'm')
                                    <i class="fas fa-male text-primary"></i> Male

                                @else
                                    <i class="fas fa-female text-primary"></i> Female

                                @endif
                            </td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="users/{{ $user->id }}/edit"><i class="fas fa-edit"></i></a>
                                <a href="/users/delete"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
