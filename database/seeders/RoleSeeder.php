<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'   => 'Super Admin',
                'status' => 'active',
            ],
            [
                'name'   => 'Admin',
                'status' => 'active',
            ],
            [
                'name'   => 'Service Provider',
                'status' => 'active',
            ],
            [
                'name'   => 'Customer',
                'status' => 'active',
            ],
            [
                'name'   => 'Guest',
                'status' => 'active',
            ],
        ];

        foreach ($data as $role) {
            Role::create($role);
        }
    }
}
