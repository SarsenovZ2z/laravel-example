<?php

namespace App\Modules\Country\Contracts;

use App\Modules\Country\Models\Country;

interface CountryServiceContract
{

    public function getCountryByCode(string $code): ?Country;

}
