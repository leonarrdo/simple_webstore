<?php

namespace Database\Seeders;

use App\Models\AttributeType;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        AttributeType::factory()->create(['id' => 1, 'name' => 'Color']);
        AttributeType::factory()->create(['id' => 2, 'name' => 'Size']);
        AttributeType::factory()->create(['id' => 3, 'name' => 'Material']);
        AttributeType::factory()->create(['id' => 4, 'name' => 'Brand']);
        AttributeType::factory()->create(['id' => 5, 'name' => 'Weight']);

        Product::factory()->create(['name' => 'Jacket']);
        Product::factory()->create(['name' => 'T-Shirt']);
        Product::factory()->create(['name' => 'Jeans']);
        Product::factory()->create(['name' => 'Sneakers']);
        Product::factory()->create(['name' => 'Hat']);
        Product::factory()->create(['name' => 'Socks']);
    }
}
