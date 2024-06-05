<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\Size;
use App\Models\Product;
use App\Models\RawProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $rawProduct = RawProduct::query()->inRandomOrder()->first();

        $size = Size::factory()->create([
            'raw_product_id' => $rawProduct->id,
        ]);

        $box = Box::factory()->create([
            'raw_product_id' => $rawProduct->id,
            'size_id' => $size->id,
        ]);

        return [
            'name' => $this->faker->word,
            'raw_product_id' => $rawProduct->id,
            'size_id' => $size->id,
            'box_id' => $box->id,
            'stock' => $this->faker->numberBetween(1, 10),
        ];
    }
}

