<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Phấn má', 'status' => 1]);
        Category::create(['name' => 'Son', 'status' => 1]);
        Category::create(['name' => 'Kẻ mắt', 'status' => 1]);
        Category::create(['name' => 'Nail', 'status' => 1]);
        Category::create(['name' => 'Kem dưỡng', 'status' => 1]);
    }
}
