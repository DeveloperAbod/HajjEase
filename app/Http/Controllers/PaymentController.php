<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserStatus;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
        $this->middleware('permission:عرض المدفوعات', ['only' => ['index', 'show']]);
        $this->middleware('permission:اضافة دفع', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل دفع', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف دفع', ['only' => ['destroy']]);
    }

    // Display a list of all payments
    public function index()
    {
        $payments = Payment::with(['booking', 'creator'])->get();
        return view('payments.index', compact('payments'));
    }

    // Show the form for creating a new payment
    public function create()
    {
        // Get all bookings where the remaining amount is greater than 0
        $bookings = Booking::all()->filter(function ($booking) {
            return $booking->remainingAmount() > 0;
        });
        return view('payments.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        // Find the booking
        $booking = Booking::findOrFail($request->booking_id);

        // Calculate the remaining amount for the booking
        $remainingAmount = $booking->remainingAmount();

        // Validate the request
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount_paid' => 'required|numeric|min:0|max:' . $remainingAmount,  // Using max for the remaining amount
            'receipt_number' => 'required|numeric|digits_between:1,10|unique:payments,receipt_number',
            'receipt_date' => 'required|date',
        ]);

        // Create the payment
        Payment::create([
            'booking_id' => $request->booking_id,
            'amount_paid' => $request->amount_paid,
            'receipt_number' => $request->receipt_number,
            'receipt_date' => $request->receipt_date,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('payments')
            ->with('icon', 'success')
            ->with('msg', 'تم إنشاء الدفع بنجاح.');
    }


    // Show a specific payment
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    // Show the form for editing an existing payment
    public function edit(Payment $payment)
    {
        // Fetch the total amount from the booking related to this payment
        $totalAmount = $payment->booking->totalAmount();

        // Fetch all payments related to this booking
        $relatedPayments = $payment->booking->payments;

        // Sum the amounts already paid for this booking
        $amountPaidSoFar = $relatedPayments->sum('amount_paid');

        // Calculate the remaining amount
        $remainingAmount = $totalAmount - $amountPaidSoFar + $payment->amount_paid;

        return view('payments.edit', compact('payment', 'totalAmount', 'remainingAmount'));
    }


    public function update(Request $request, Payment $payment)
    {
        // Find the related booking
        $booking = $payment->booking;

        // Calculate the remaining amount, including the current payment
        $remainingAmount = $booking->remainingAmount() + $payment->amount_paid;

        // Validate the request
        $request->validate([
            'amount_paid' => 'required|numeric|min:0|max:' . $remainingAmount,  // Using max for the remaining amount
            'receipt_number' => 'required|numeric|digits_between:1,10|unique:payments,receipt_number,' . $payment->id,
            'receipt_date' => 'required|date',
        ]);

        // Update the payment
        $payment->update([
            'amount_paid' => $request->amount_paid,
            'receipt_number' => $request->receipt_number,
            'receipt_date' => $request->receipt_date,
        ]);

        return redirect()->route('payments')
            ->with('icon', 'success')
            ->with('msg', 'تم تحديث الدفع بنجاح.');
    }



    // Delete the specified payment from the database
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments')
            ->with('icon', 'success')
            ->with('msg', 'تم حذف الدفع بنجاح.');
    }
}
