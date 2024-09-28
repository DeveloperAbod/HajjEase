<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'pilgrim_id',
        'trip_id',
        'created_by',
        'date',
        'status',
    ];

    public function pilgrim(): BelongsTo
    {
        return $this->belongsTo(Pilgrim::class);
    }

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
    public function paymentStatus()
    {
        $tripPrice = $this->trip->price;
        $amountPaid = $this->amount_paid();

        if ($amountPaid >= $tripPrice) {
            return 'مدفوع بالكامل';
        } elseif ($amountPaid > 0) {
            return 'قسط';
        } else {
            return 'غير مدفوع';
        }
    }
    public function Status()
    {
        $status = $this->status;
        if ($status == 1) {
            return "مقبول";
        } elseif ($status == 2) {
            return 'مرفوض';
        } elseif ($status == 0) {
            return 'قيد المراجعة';
        }
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class); // Assuming you have a Payment model
    }

    public function totalAmount(): float
    {
        return $this->trip->price; // Assuming the Trip model has a price attribute
    }

    public function remainingAmount()
    {
        // Get the total amount for the booking
        $totalAmount = $this->totalAmount(); // Assuming this method returns the total amount for the booking

        // Calculate the total amount paid for this booking excluding the current payment being updated
        $totalPaid = $this->payments()->sum('amount_paid');

        return $totalAmount - $totalPaid;
    }

    public function amount_paid(): float
    {
        return  $this->payments->sum('amount_paid');
    }
}