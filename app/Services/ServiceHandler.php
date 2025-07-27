<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Service;

class ServiceHandler
{
    public function create(array $data): Service
    {
       return Service::create($data);
    }

    public function update(array $data, Service $service): Service
    {
        return tap($service)->update($data);
    }

    public function delete(Service $service): void
    {
        $service->delete();
    }
}
