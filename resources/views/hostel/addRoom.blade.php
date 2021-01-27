@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Add a Room To Hostel</h4>
                    </div>

                    <div class="card-body">
                        <form action="/rooms" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="room_number" class="col-md-4 col-form-label text-md-right">Room Number:</label>

                                <div class="col-md-6">
                                    <input id="room_number" placeholder="Ex.001" type="number" class="form-control @error('room_number') is-invalid @enderror" name="room_number" value="{{ old('room_number') }}" required autocomplete="room_number" autofocus>

                                    @error('room_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hostel_id" class="col-md-4 col-form-label text-md-right">Hostel:</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('hostel_id') is-invalid @enderror" id="hostel_id" name="hostel_id" required autofocus>
                                        <option selected disabled value="">Select Below</option>
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
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Save Room</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
