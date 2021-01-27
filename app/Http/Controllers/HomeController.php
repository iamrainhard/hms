<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get authenticated user
        $user = Auth::user();

        //assign the manager to associated hostel data in summary view
        if($user->role == 'manager' && $user->hostel !== null) {
            $managerhostel = $user->hostel;
        }else{
            $managerhostel = null;
        }

        //get the user request in home view
        if($user->request !== null){
            $userrequest = $user->request;
            //dd($userrequest->hostel);
        }else{
            $userrequest = null;
        }

        // get the user hostel assigned
        $userhostel = $user->hostel;
        $userroom = $user->room;

        //get data for manager dashboard
        if ($managerhostel !== null){
            $allhostelusers = $managerhostel->users;
            $members = $allhostelusers->where('room_id', !null);
            $hostelrequests = $managerhostel->requests;
            $pendingrequests = $hostelrequests->where('status', 'pending');
            //dd($members);
        }else{
            $members = null;
            $hostelrequests = null;
            $pendingrequests = null;
        }



        //get all data for Admin dashboard
        $allhostels = Hostel::get();
        $allfreehostels = Hostel::where('capacity', 'free')->get();
        $hostelusers = User::where('hostel_id', !null)->get();
        $managers = User::where('role', 'manager')->get();

        //dd($hostelusers);

        //redirect dashboard according to the role
        if ($user->role == 'user'){
            return view('user.home', compact('userhostel','userrequest', 'userroom' ));
        }elseif($user->role == 'manager'){
            return view('manager.summary', compact('managerhostel', 'members', 'pendingrequests'));
        }else{
            return view('admin.management', compact('allhostels', 'allfreehostels','hostelusers', 'managers'));
        }

    }
}
