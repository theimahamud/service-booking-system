<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;

class ServiceController extends BaseController
{
    public function store(StoreServiceRequest $request)
    {

    }

    public function update(StoreServiceRequest $request, Service $service)
    {

    }

    public function destroy(Service $service)
    {

    }
}
