@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-primary">Request Portal</div>

                    <div class="card-body">
                        @if($myrequest !== null)
                        <div class="align-items-center">
                            <h5>Hello {{ $myrequest->user->name }}!<br> Your request status is currently
                                @if($myrequest->status == 'pending')
                                    <span class="text-primary text-capitalize">{{ $myrequest->status }}..!</span>
                                @elseif($myrequest->status == 'approved')
                                    <span class="text-success text-capitalize">{{ $myrequest->status }}..!</span>
                                @else
                                    <span class="text-danger text-capitalize">{{ $myrequest->status }}..!</span>
                                @endif
                            </h5>
                        </div>
                        @else
                            <div class="align-items-center">
                                <h5 class="text-danger">You have no submitted request!</h5>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requestModal">
                                    Request A Room
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Room Request Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/request" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="hostel">Select the desired Hostel</label>
                            <select class="form-control @error('hostel_id') is-invalid @enderror" required autocomplete="hostel_id" autofocus id="hostel" name="hostel_id">
                                <option value="" selected disabled>Select Hostel below</option>
                                @foreach($hostels as $hostel)
                                <option value="{{ $hostel->id }}" >{{ $hostel->name }}</option>
                                @endforeach
                            </select>
                            @error('hostel_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a  class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Send Request</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
