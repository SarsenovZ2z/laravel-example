<?php

namespace App\Modules\Country;

use App\Modules\Country\Contracts\CountryServiceContract;
use App\Modules\Country\Models\Country;
use App\Modules\Country\Repositories\CountryRepository;

class CountryService implements CountryServiceContract
{

    public function __construct(
        protected CountryRepository $countryRepository,
    )
    {

    }

    public function getCountryByCode(string $code): ?Country
    {
        return $this->countryRepository->getCountryByCode($code);
    }
}
