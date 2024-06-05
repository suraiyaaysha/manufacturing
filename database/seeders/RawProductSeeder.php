<?php

namespace Database\Seeders;

use App\Models\RawProduct;
use Illuminate\Database\Seeder;

class RawProductSeeder extends Seeder
{
    public function run()
    {
        $rawProducts = [
            ['name' => 'Sweets', 'prefix' => 'SW'],
            ['name' => 'Liquid', 'prefix' => 'LI'],
            ['name' => 'Grains', 'prefix' => 'GR'],
            ['name' => 'Vegetables', 'prefix' => 'VE'],
            ['name' => 'Fruits', 'prefix' => 'FR']
        ];

        foreach ($rawProducts as $rawProduct) {
            RawProduct::create([
                'name' => $rawProduct['name'],
                'prefix' => $rawProduct['prefix'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

