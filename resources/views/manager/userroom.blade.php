@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit User Room</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit User's Room Status</h6>
                    </div>

                    <div class="card-body">
                        <form action="/userroom/{{ $user->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="room_id">Select User's Room</label>
                                <select class="form-control @error('room_id') is-invalid @enderror" required autocomplete="room_id" autofocus id="room_id" name="room_id">
                                    @if($user->room_id !== null)
                                        <option selected value="{{$user->room_id}}">Room {{$user->room->room_number}}</option>
                                    @else
                                        <option selected disabled value="">Select Room below</option>
                                    @endif
                                    @foreach($rooms as $room)
                                        @if($room->id !== $user->room_id)
                                        <option value="{{ $room->id }}">Room {{ $room->room_number }}</option>
                                            @endif
                                    @endforeach
                                </select>
                                @error('room_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update User's Room</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
