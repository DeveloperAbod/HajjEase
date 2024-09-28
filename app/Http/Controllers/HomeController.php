<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserStatus;
use App\Models\Booking;
use App\Models\Office;
use App\Models\Payment;
use App\Models\Pilgrim;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users_unm = User::all()->count();
        $Roles_unm = Role::all()->count();
        $trips_unm = Trip::all()->count();
        $pilgrims_unm = Pilgrim::all()->count();
        $offices_unm = Office::all()->count();
        $bookings_unm = Booking::all()->count();
        $payments_unm = Payment::all()->count();
        $payments_amount = Payment::all();
        $totalAmountPaid = Payment::sum('amount_paid');
        return view(
            'index',
            compact('users_unm', 'Roles_unm', 'trips_unm', 'bookings_unm', 'pilgrims_unm', 'offices_unm', 'payments_unm', 'totalAmountPaid')
        );
    }
}
