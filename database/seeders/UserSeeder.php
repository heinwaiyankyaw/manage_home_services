<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name'       => 'Super Admin',
                'username'   => 'superadmin',
                'email'      => 'superadmin@gmail.com',
                'password'   => Hash::make('password123'),
                'status'     => 'active',
                'role_id'    => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin',
                'username'   => 'admin',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('password123'),
                'status'     => 'active',
                'role_id'    => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'CleanPro Services',
                'username'   => 'cleanpro',
                'email'      => 'cleanpro@example.com',
                'address'    => '123 Jalan Bersih, Kuala Lumpur',
                'password'   => Hash::make('password123'),
                'status'     => 'active',
                'role_id'    => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'PlumbMaster',
                'username'   => 'plumbmaster',
                'email'      => 'plumbmaster@example.com',
                'address'    => '456 Jalan Pipa, Selangor',
                'password'   => Hash::make('password123'),
                'status'     => 'active',
                'role_id'    => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'ElectricPlus',
                'username'   => 'electricplus',
                'email'      => 'electricplus@example.com',
                'address'    => '789 Jalan Kabel, Penang',
                'password'   => Hash::make('password123'),
                'status'     => 'active',
                'role_id'    => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($datas as $data) {
            User::create($data);
        }

    }
}
