<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserStatus;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    function __construct()
    {
        // Apply the auth middleware to all actions in this controller
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
    }

    // Display a list of all trips
    public function index()
    {
        $trips = Trip::with(['creator'])->get();
        return view('trips.index', compact('trips'));
    }

    // Show the form for creating a new trip
    public function create()
    {
        return view('trips.create');
    }

    // Store a newly created trip in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'price' => 'required|numeric|digits_between:1,10',
            'available_seats' => 'required|numeric|digits_between:1,10',

        ]);

        // Create a new trip instance
        Trip::create([
            'name' => $request->name,
            'date' => $request->date,
            'price' => $request->price,
            'available_seats' => $request->available_seats,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('trips')
            ->with('icon', 'success')
            ->with('msg', 'تم إضافة الرحلة بنجاح');
    }

    // Show a specific trip
    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }

    // Show the form for editing an existing trip
    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    // Update the specified trip in the database
    public function update(Request $request, Trip $trip)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'price' => 'required|numeric|digits_between:1,10',
            'available_seats' => 'required|numeric|digits_between:1,10',
        ]);

        // Update the trip with the new data
        $trip->update([
            'name' => $request->name,
            'date' => $request->date,
            'price' => $request->price,
            'available_seats' => $request->available_seats,
        ]);

        return redirect()->route('trips')
            ->with('icon', 'success')
            ->with('msg', 'تم تحديث الرحلة بنجاح');
    }

    // Delete the specified trip from the database
    public function destroy(Trip $trip)
    {
        // Delete the trip
        $trip->delete();

        return redirect()->route('trips')
            ->with('icon', 'success')
            ->with('msg', 'تم حذف الرحلة بنجاح');
    }
}