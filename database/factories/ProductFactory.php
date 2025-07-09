<?php

namespace Database\Factories;

use App\Models\AttributeType;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'      => $this->faker->words(1, true),
            'price'     => $this->faker->randomFloat(2, 10, 5000),
            'is_active' => $this->faker->boolean(70),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            ProductAttribute::factory()->create(['product_id' => $product->id,'attribute_type_id' => AttributeType::COLOR_ID,'value' => $this->faker->colorName()]);
            ProductAttribute::factory()->create(['product_id' => $product->id,'attribute_type_id' => AttributeType::SIZE_ID, 'value' => $this->faker->randomElement(['S', 'M', 'L', 'XL'])]);
            ProductAttribute::factory()->create(['product_id' => $product->id,'attribute_type_id' => AttributeType::MATERIAL_ID,'value' => $this->faker->randomElement(['Cotton', 'Polyester', 'Silk'])]);
            ProductAttribute::factory()->create(['product_id' => $product->id,'attribute_type_id' => AttributeType::BRAND_ID,'value' => $this->faker->company()]);
            ProductAttribute::factory()->create(['product_id' => $product->id,'attribute_type_id' => AttributeType::WEIGHT_ID,'value' => $this->faker->numberBetween(100, 2000) . 'g']);

            ProductImage::factory()->create(['product_id' => $product->id]);
        });
    }
}
