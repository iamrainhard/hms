@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>

            <div class="card-body">
                <form action="/users/{{ $user->id }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" value="{{ $user->name }}" id="name" placeholder="Your Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" value="{{ $user->email }}" autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">User Gender</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required autocomplete="gender" >
                                @if($user->gender == 'm')
                                    <option selected value="m">Male</option>
                                    <option value="f">Female</option>
                                @else
                                    <option value="m">Male</option>
                                    <option selected value="f">Female</option>
                                @endif
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    @if($hostels !== null)
                        <div class="form-group">
                            <label for="hostel_id">Assign Hostel</label>
                            <select name="hostel_id" id="hostel_id" class="form-control  @error('hostel_id') is-invalid @enderror" required autocomplete="hostel_id" >
                                @if($user->hostel_id !== null)
                                    <option selected value="{{$user->hostel_id}}">{{$user->hostel->name}}</option>
                                @else
                                    <option selected disabled value="">Select Hostel below</option>
                                @endif
                                @foreach($hostels as $hostel)
                                    <option value="{{ $hostel->id }}">{{ $hostel->name }}</option>
                                @endforeach
                            </select>

                            @error('hostel_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endif
                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select name="role" id="role" class="form-control  @error('role') is-invalid @enderror" required autocomplete="role" >
                                @if($user->hostel_id !== null)
                                    @if($user->role == 'user')
                                        <option selected value="user">Normal User</option>
                                        <option value="manager">Hostel Manager</option>
                                        <option value="admin">Administrator</option>
                                    @elseif($user->role == 'manager')
                                        <option  value="user">Normal User</option>
                                        <option selected value="manager">Hostel Manager</option>
                                        <option value="admin">Administrator</option>
                                    @else
                                        <option  value="user">Normal User</option>
                                        <option  value="manager">Hostel Manager</option>
                                        <option selected value="admin">Administrator</option>
                                    @endif
                                @else
                                    @if($user->role == 'user')
                                        <option selected value="user">Normal User</option>
                                        <option value="admin">Administrator</option>
                                    @else
                                        <option  value="user">Normal User</option>
                                        <option selected value="admin">Administrator</option>
                                    @endif
                                @endif
                            </select>

                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="password">User Password</label>
                            <input type="password" name="password" class="form-control form-control-user @error('gender') is-invalid @enderror" id="password" placeholder="Password">
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
