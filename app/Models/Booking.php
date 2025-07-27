<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\BookingStatus;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'booking_date',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'status' => BookingStatus::class,
            'booking_date' => 'datetime',
        ];
    }
}
