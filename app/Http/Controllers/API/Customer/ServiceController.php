<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\API\BaseController;
use App\Models\Service;

class ServiceController extends BaseController
{
    public function index()
    {
        $services = Service::where('status',true)->get();
    }
}
