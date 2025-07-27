<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Booking;

class BookingService
{
    public function bookService(array $data): Booking
    {
        $data['user_id'] = auth()->user()->id;
        return Booking::create($data);
    }
}
