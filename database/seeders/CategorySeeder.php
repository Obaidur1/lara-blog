<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'technology'],
            ['id' => 2, 'name' => 'automotive'],
            ['id' => 3, 'name' => 'finance'],
            ['id' => 4, 'name' => 'politics'],
            ['id' => 5, 'name' => 'culture'],
            ['id' => 6, 'name' => 'sports'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
