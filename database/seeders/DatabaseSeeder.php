<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();
        // Product::factory(20)->create();
        // ProductVariant::factory(20)->create();
        // ProductImage::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('12345678'),
        //     'phone' => '1234567890',
        //     'address' => '123 admin street',
        //     'role' => 'admin'
        // ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678'),
            'phone' => '1234567891',
            'address' => '123 user street',
            'role' => 'user'
        ]);

        

        // $this->call(ProductSeeder::class);
    }
}
