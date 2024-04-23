<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Database\Factories\ProductCategoryFactory;
class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // Generate fake product category data
        ProductCategory::factory()->count(10)->create();
    }
}
