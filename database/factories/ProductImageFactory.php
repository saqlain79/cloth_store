<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => $this->faker->numberBetween(0, 19),
            'image_url' => $this->faker->imageUrl(640, 480, 'fashion', true),
            'is_primary' => $this->faker->boolean(20), // 20% chance to be primary
        ];
    }
}
