<?php

namespace App\Rules;

use App\Modules\Country\Repositories\CountryRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckTaxNumberValidity implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // TODO: чтобы не было зависимости, нужно вынести в фасад
        /** @var CountryRepository $countryRepository */
        $countryRepository = resolve(CountryRepository::class);

        if (!is_string($value) || !$countryRepository->isTaxNumberValid($value)) {
            $fail('Invalid tax number');
        }
    }
}
