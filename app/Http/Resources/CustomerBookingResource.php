<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
          'id' => $this->id,
          'customer_name' => $this->customer->name ?? '',
          'service_name' => $this->service->name ?? '',
          'service_price' => $this->service->price ?? '',
          'booking_date' => $this->booking_date->format('d-m-Y'),
          'status' => $this->status,
      ];
    }
}
