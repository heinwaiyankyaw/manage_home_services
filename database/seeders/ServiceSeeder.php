<?php
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // CleanPro Services
            [
                'name'        => 'Premium Home Cleaning',
                'user_id'     => 3,
                'category_id' => 1, // Cleaning category
                'description' => 'Thorough cleaning service including living room, bedrooms, kitchen, and bathrooms. We use eco-friendly products.',
                'price'       => 120.00,
                'duration'    => 3, // hours
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Move-In/Move-Out Cleaning',
                'user_id'     => 3,
                'category_id' => 1,
                'description' => 'Complete deep cleaning for rental properties before moving in or after moving out.',
                'price'       => 200.00,
                'duration'    => 5,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // PlumbMaster
            [
                'name'        => 'Emergency Pipe Repair',
                'user_id'     => 4,
                'category_id' => 2, // Plumbing category
                'description' => '24/7 emergency service for burst pipes, leaks, and urgent plumbing issues.',
                'price'       => 150.00,
                'duration'    => 2,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Water Heater Installation',
                'user_id'     => 4,
                'category_id' => 2,
                'description' => 'Professional installation of storage and instant water heaters with warranty.',
                'price'       => 80.00,
                'duration'    => 2,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // ElectricPlus
            [
                'name'        => 'Electrical Wiring Installation',
                'user_id'     => 5,
                'category_id' => 3, // Electrical category
                'description' => 'Safe and professional wiring installation for new constructions or renovations.',
                'price'       => 250.00,
                'duration'    => 4,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Lighting Fixture Installation',
                'user_id'     => 5,
                'category_id' => 3,
                'description' => 'Installation of ceiling lights, wall lamps, and other lighting fixtures.',
                'price'       => 60.00,
                'duration'    => 1,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
