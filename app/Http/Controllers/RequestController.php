<?php

namespace App\Http\Controllers;



use App\Models\Hostel;
use App\Models\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('isManager');
        $user = Auth::user();
        if($user->role == 'manager' && $user->hostel !== null) {
            $managerhostel = $user->hostel;
            $hostelrequests = $managerhostel->requests;
        }else{
            $managerhostel = null;
            $hostelrequests = null;
        }

        return view('manager.requests', compact('managerhostel', 'hostelrequests'));
    }

    public function approved()
    {
        $this->authorize('isManager');

        $user = Auth::user();
        if($user->role == 'manager' && $user->hostel !== null) {
            $managerhostel = $user->hostel;
            $hostelrequests = $managerhostel->requests;
            $approved = $hostelrequests->where('status', 'approved');
        }else{
            $managerhostel = null;
            $hostelrequests = null;
            $approved = null;
        }

        return view('manager.approvedRequests', compact('approved'));
    }

    public function create()
    {

        $myrequest = Request::where('user_id', Auth::user()->id)->first();
//        dd($requests);

        $hostels = Hostel::where('gender', Auth::user()->gender)->get();

        return view('user.myrequest', compact('myrequest', 'hostels'));
    }

    public function store()
    {
        $data = request()->validate([
            'hostel_id' => 'required',
        ]);
        $user = Auth::user()->id;

          Request::create([
              'hostel_id' => $data['hostel_id'],
              'user_id' => $user
          ]);

          return redirect('/request');

    }

    public function edit(Request $request)
    {
        $this->authorize('isManager');
        return view('manager.editRequest', compact('request'));
    }
    public function getRoom(\Illuminate\Http\Request $request)
    {
        $data['rooms'] = Room::where("hostel_id",$request->hostel_id)
            ->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $this->authorize('isManager');

        $data = request()->validate([
            'status' => 'required',
        ]);
        $room = request('room_id');
//        dd($room);
        $request->update($data);

        if($data['status'] == 'approved') {
            $user = User::find($request['user_id']);
            $user->hostel_id = $request['hostel_id'];
            $user->room_id = $room;
            $user->save();
            return redirect('/requests/approved');
        }else{
            return redirect('/requests/all');
        }

    }
}
