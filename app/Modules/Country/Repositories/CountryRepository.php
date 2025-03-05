<?php

namespace App\Modules\Country\Repositories;

use App\Modules\Country\Models\Country;

class CountryRepository
{

    public function getCountryByCode(string $code): ?Country
    {
        /** @var ?Country $country */
        $country = Country::query()->where('code', $code)->first();

        return $country;
    }

}
