<?php

namespace Database\Factories;

use App\Models\Size;
use App\Models\RawProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    protected $model = Size::class;

    public function definition()
    {

        // size in the format: 17 (.054) x 5/8
        $size = $this->faker->randomFloat(2, 0.1, 99.9); // Random value between 0.1 and 99.9
        $size .= ' (.';
        $size .= $this->faker->numberBetween(1, 999); // Random value between 1 and 999 for the decimal part
        $size .= ') x ';
        $size .= $this->faker->randomElement(['1/8', '1/4', '3/8', '1/2', '5/8', '3/4', '7/8']);

        // Generate price for 1000 pieces
        $priceFor1000 = $this->faker->randomFloat(2, 100, 10000);

        // Calculate price for a single raw product
        $pricePerUnit = $priceFor1000 / 1000;

        return [
            'raw_product_id' => RawProduct::query()->inRandomOrder()->first()->id,
            'size' => $size,
            'price' => $pricePerUnit,
        ]; 

    }
}
