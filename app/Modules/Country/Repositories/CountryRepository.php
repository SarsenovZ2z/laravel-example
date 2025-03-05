<?php

namespace App\Modules\Country\Repositories;

use App\Modules\Country\Models\Country;

class CountryRepository
{

    public function getCountryByCode(string $code): ?Country
    {
        return Country::query()
            ->where('code', strtolower($code))
            ->first();
    }

    public function getCountryByTaxNumber(string $tax_number): ?Country
    {
        $code = $this->getCountryCodeFromTaxNumber($tax_number);

        return $this->getCountryByCode($code);
    }

    public function isTaxNumberValid(string $tax_number): bool
    {
        if (!preg_match('/^[A-Za-z]{2}\d+$/', $tax_number)) {
            return false;
        }

        $code = $this->getCountryCodeFromTaxNumber($tax_number);

        return $this->getCountryByCode($code) != null;
    }

    private function getCountryCodeFromTaxNumber(string $tax_number): string
    {
        return substr($tax_number, 0, 2);
    }
}
