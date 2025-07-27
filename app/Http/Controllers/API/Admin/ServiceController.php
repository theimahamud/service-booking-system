<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Admin;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use App\Services\ServiceHandler;

class ServiceController extends BaseController
{
    public function __construct(protected ServiceHandler $serviceHandler) {}

    public function store(StoreServiceRequest $request)
    {
        $result = $this->serviceHandler->create($request->validated());

        return $this->sendResponse($result, Message::SERVICE_CREATED, 201);
    }

    public function update(StoreServiceRequest $request, Service $service)
    {
        $result = $this->serviceHandler->update($request->validated(), $service);

        return $this->sendResponse($result, Message::SERVICE_UPDATED, 201);
    }

    public function destroy(Service $service)
    {
        $this->serviceHandler->delete($service);

        return $this->sendResponse([], Message::SERVICE_DELETED, 201);
    }
}
