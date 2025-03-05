<?php

namespace Database\Seeders;

use App\Modules\Country\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::query()
            ->insert([
                [
                    'code' => 'kz',
                    'name' => 'Казахстан',
                    'vat_tax' => 12,
                ],
                [
                    'code' => 'de',
                    'name' => 'Германия',
                    'vat_tax' => 19,
                ],
                [
                    'code' => 'it',
                    'name' => 'Италия',
                    'vat_tax' => 22,
                ],
                [
                    'code' => 'ge',
                    'name' => 'Греция',
                    'vat_tax' => 24,
                ],
            ]);
    }
}
