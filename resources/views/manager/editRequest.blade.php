@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Request</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Request Status</h6>
                    </div>

                    <div class="card-body">
                        <form action="/request/{{ $request->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="status">Update Request Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" required autocomplete="status" autofocus id="status" name="status">
                                    <option value="" selected disabled>Select Status below</option>
                                    <option value="approved" >Approve Request</option>
                                    <option value="rejected" >Reject Request</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
