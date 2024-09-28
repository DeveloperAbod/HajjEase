<?php

namespace App\Models;

use App\Enums\IdentityType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pilgrim extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'identity_number',
        'identity_type',
        'phone',
        'health_status',
        'created_by',

    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function bookings(): HasMany
    {
        return $this->hasMany(booking::class);
    }


    protected $casts = [
        'identity_type' => IdentityType::class,
    ];
}
