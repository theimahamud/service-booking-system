<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Customer;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends BaseController
{
    public function index(): JsonResponse
    {
        $services = Service::where('status',true)->latest()->paginate();

        return $this->sendResponse(ServiceResource::collection($services), Message::SERVICE_GET);
    }
}
