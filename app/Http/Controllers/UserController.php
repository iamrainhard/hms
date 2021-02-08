<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        $this->authorize('isAdmin');
        $hostels = Hostel::where('gender', $user->gender)->get();
        return view('admin.editUser', compact('user', 'hostels' ));
    }

    public function getRoom(Request $request)
    {
        $data['rooms'] = Room::where("hostel_id",$request->hostel_id)
            ->get(["room_number","id"]);
        return response()->json($data);
    }

    public function update(Request $request,User $user)
    {
        $this->authorize('isAdmin');
        $data = $request->all();

        if(empty($data['password'])){
            $user->update($request->except('password'));
        }else{
            $data['password'] = Hash::make($data['password']);
            $user->update($data);
        }
        return redirect('/users');
    }

    public function userRoom(User $user)
    {
        $this->authorize('isManager');
        $rooms = $user->hostel->rooms;
//        dd($rooms);
        return view('manager.userroom', compact('user', 'rooms'));
    }

    public function userRoomUpdate(Request $request,User $user)
    {
        $this->authorize('isManager');
        $data = $request->only(['room_id']);
//        dd($data);
        $user->update($data);

        return redirect('/requests/approved');

    }

    public function destroy(User $user)
    {
        $this->authorize('isAdmin');
        $user->delete();
        return redirect('/users');
    }
}
