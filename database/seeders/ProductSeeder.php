<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use factories\ProductFactory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('products')->insert([
        //     'name' => str::random(10),
        //     'slug' => str::random(8),
        //     'description' => str::random(20),
        //     'brand' => str::random(5),
        //     'is_active' => true
        // ]);
        // Product::factory(20)->create();
    }
}
