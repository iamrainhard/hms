<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $this->authorize('isManager');

        // get authenticated user
        $user = Auth::user();

        //assign the manager to associated hostel data in summary view
        if($user->role == 'manager' && $user->hostel !== null) {
            $managerhostel = $user->hostel;
            $rooms = $managerhostel->rooms;


        }else{
            $managerhostel = null;
            $rooms = null;
        }

        return view('manager.roomManagement', compact('rooms'));
    }

    public function create()
    {
        $this->authorize('isAdmin');
        $hostels = Hostel::all();
        return view('hostel.addRoom', compact('hostels'));
    }

    public function store()
    {
        $this->authorize('isAdmin');
        $data = request()->validate([
            'room_number' => 'required|min:3',
            'hostel_id' => 'required',
        ]);

        Room::create($data);
        return redirect('/home');
    }

    public function destroy(Room $room)
    {
        $this->authorize('isAdmin');
        $room->delete();
        return redirect('/home');
    }
}
