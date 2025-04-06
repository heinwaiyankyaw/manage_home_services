<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'   => 'Cleaning Services',
                'status' => 'active',
            ],
            [
                'name'   => 'Plumbing',
                'status' => 'active',
            ],
            [
                'name'   => 'Electrical Repairs',
                'status' => 'active',
            ],
            [
                'name'   => 'Gardening',
                'status' => 'active',
            ],
            [
                'name'   => 'Home Appliance Maintenance',
                'status' => 'active',
            ],
        ];

        foreach ($data as $category) {
            Category::create($category);
        }
    }
}
