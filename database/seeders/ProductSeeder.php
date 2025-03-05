<?php

namespace Database\Seeders;

use App\Modules\Product\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()
            ->insert([
                [
                    'name' => 'Наушники',
                    'price' => 100,
                ],
                [
                    'name' => 'Чехол для телефона',
                    'price' => 20,
                ],
            ]);
    }
}
