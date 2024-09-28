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


        //   الإحصائيات الشهرية للمستخدمين
        $monthlyUsers = User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');
        //   الإحصائيات الشهرية للجاج
        $monthlyPilgrims = Pilgrim::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');
        // الإحصائيات الشهرية للرحلات
        $monthlyTrips = Trip::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        // الإحصائيات الشهرية للحجوزات
        $monthlyBookings = Booking::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        // الإحصائيات الشهرية للمدفوعات
        $monthlyPayments = Payment::selectRaw('SUM(amount_paid) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('total', 'month');







        return view(
            'index',
            [
                'users_unm' => $users_unm,
                'Roles_unm' => $Roles_unm,
                'trips_unm' => $trips_unm,
                'bookings_unm' => $bookings_unm,
                'pilgrims_unm' => $pilgrims_unm,
                'offices_unm' => $offices_unm,
                'payments_unm' => $payments_unm,
                'totalAmountPaid' => $totalAmountPaid,
                'monthlyUsers' => $this->formatChartData($monthlyUsers),
                'monthlyTrips' => $this->formatChartData($monthlyTrips),
                'monthlyBookings' => $this->formatChartData($monthlyBookings),
                'monthlyPayments' => $this->formatChartData($monthlyPayments),
                'monthlyPilgrims' => $this->formatChartData($monthlyPilgrims),


            ]
        );
    }



    private function formatChartData($data)
    {
        $formatted = [];
        for ($i = 1; $i <= 12; $i++) {
            $formatted[] = $data[$i] ?? 0;  // إذا كان الشهر ما يحتوي على بيانات، نحط القيمة 0
        }
        return $formatted;
    }
}
