<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Customer;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\ServiceBookingResource;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;

class BookingController extends BaseController
{
    public function index(): JsonResponse
    {
        $bookings = Booking::with('service','customer')->where('user_id',auth()->user()->id)->get();

        return $this->sendResponse(ServiceBookingResource::collection($bookings), Message::BOOKING_GET);
    }

    public function store(StoreBookingRequest $request, BookingService $bookingService): JsonResponse
    {
        $result = $bookingService->bookService($request->validated());

        return $this->sendResponse($result, Message::SERVICE_BOOKED, 201);
    }
}
