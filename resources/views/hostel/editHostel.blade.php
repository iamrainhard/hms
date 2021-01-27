@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary">Edit Hostel Details</h4>
                    </div>

                    <div class="card-body">
                        <form action="/hostels/{{ $hostel->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Hostel Name:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $hostel->name }}"  autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Hostel Gender:</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus>
                                        @if($hostel->gender == 'm')
                                        <option selected value="m">Men's Hostel</option>
                                        <option value="f">Women's Hostel</option>
                                        @else
                                            <option value="m">Men's Hostel</option>
                                            <option selected value="f">Women's Hostel</option>
                                            @endif
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="capacity" class="col-md-4 col-form-label text-md-right">Hostel Capacity:</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" required autofocus>
                                        @if($hostel->capacity == 'full')
                                        <option selected value="full">Hostel is Full</option>
                                        <option value="free">Hostel Has Free Space</option>
                                        @else
                                            <option value="full">Hostel is Full</option>
                                            <option selected value="free">Hostel Has Free Space</option>
                                            @endif
                                    </select>
                                    @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit Changes</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
