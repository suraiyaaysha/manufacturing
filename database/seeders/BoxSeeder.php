<?php

namespace Database\Seeders;

use App\Models\Box;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    public function run()
    {
        Box::factory()->count(10)->create();
    }
}
