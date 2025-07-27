<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Admin;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ServiceBookingResource;
use App\Models\Booking;

class BookingController extends BaseController
{
    public function index()
    {
        $bookings = Booking::with('service','customer')->get();
        return $this->sendResponse(ServiceBookingResource::collection($bookings), Message::BOOKING_GET);
    }
}
