<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\RawProduct;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxFactory extends Factory
{
    protected $model = Box::class;

    public function definition()
    {
        return [
            'raw_product_id' => RawProduct::query()->inRandomOrder()->first()->id,
            'size_id' => Size::factory(),
            'quantity' => $this->faker->numberBetween(100, 1000),
            'weight' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}

