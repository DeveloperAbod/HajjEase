<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserStatus;
use App\Models\Booking;
use App\Models\Pilgrim;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
    }

    // Display a list of all bookings
    public function index()
    {
        $bookings = Booking::with(['pilgrim', 'trip', 'creator'])->get();
        return view('bookings.index', compact('bookings'));
    }

    // Show the form for creating a new booking
    public function create()
    {
        $pilgrims = Pilgrim::all();
        $trips = Trip::all();
        return view('bookings.create', compact('pilgrims', 'trips'));
    }

    // Store a newly created booking in the database
    public function store(Request $request)
    {
        $request->validate([
            'pilgrim_id' => 'required|exists:pilgrims,id',
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
        ]);

        Booking::create([
            'pilgrim_id' => $request->pilgrim_id,
            'trip_id' => $request->trip_id,
            'date' => $request->date,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('bookings')
            ->with('icon', 'success')
            ->with('msg', 'تم إنشاء الحجز بنجاح.');
    }

    // Show a specific booking
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    // Show the form for editing an existing booking
    public function edit(Booking $booking)
    {
        $pilgrims = Pilgrim::all();
        $trips = Trip::all();
        return view('bookings.edit', compact('booking', 'pilgrims', 'trips'));
    }

    // Update the specified booking in the database
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'pilgrim_id' => 'nullable|exists:pilgrims,id',
            'trip_id' => 'nullable|exists:trips,id',
            'date' => 'required|date',
        ]);

        $booking->update([
            'pilgrim_id' => $request->pilgrim_id,
            'trip_id' => $request->trip_id,
            'date' => $request->date,
        ]);

        return redirect()->route('bookings')
            ->with('icon', 'success')
            ->with('msg', 'تم تحديث الحجز بنجاح.');
    }

    public function accept(Booking $booking)
    {

        $booking->update([
            'status' => 1
        ]);

        return redirect()->route('bookings')
            ->with('icon', 'success')
            ->with('msg', 'تم قبول الحجز بنجاح.');
    }

    public function reject(Booking $booking)
    {

        $booking->update([
            'status' => 2
        ]);
        return redirect()->route('bookings')
            ->with('icon', 'success')
            ->with('msg', 'تم رفض الحجز بنجاح.');
    }

    // Delete the specified booking from the database
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings')
            ->with('icon', 'success')
            ->with('msg', 'تم حذف الحجز بنجاح.');
    }
}