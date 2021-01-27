<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\User;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('isAdmin');
        $hostels = Hostel::all();
        return view('hostel.hostels', compact('hostels'));
    }

    public function create()
    {
        $this->authorize('isAdmin');
        return view('hostel.addHostel');
    }

    public function store()
    {
        $this->authorize('isAdmin');
        $data = request()->validate([
            'name' => 'required|unique:hostels|sometimes',
            'gender' => 'required',
        ]);
        Hostel::create($data);
        return redirect('/hostels');

    }

    public function edit(Hostel $hostel)
    {
        $this->authorize('isAdmin');

        return view('hostel.editHostel', compact('hostel'));
    }

    public function update(Request $request,Hostel $hostel)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'name' => 'required|unique:hostels',
            'gender' => 'required',
            'capacity' => 'required',
        ]);

        $hostel->update($request->all());
        return redirect('/hostels');
    }

    public function destroy(Hostel $hostel)
    {

        $this->authorize('isAdmin');

        $hostel->delete();

        return redirect('/hostels');
    }

}
