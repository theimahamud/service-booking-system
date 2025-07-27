<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Haircut',
                'description' => 'Professional haircut service',
                'price' => 120.00,
                'status' => true,
            ],
            [
                'name' => 'Massage',
                'description' => 'Relaxing full body massage',
                'price' => 60.00,
                'status' => true,
            ],
            [
                'name' => 'Manicure',
                'description' => 'Hand care and nail treatment',
                'price' => 40.00,
                'status' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
