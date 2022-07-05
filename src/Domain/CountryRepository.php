<?php

declare(strict_types=1);

namespace App\Domain;

use App\Entity\Country;

interface CountryRepository {
    public function save(array $countryList): void;
    
    public function readAllCountries(): array;

    public function insertCountry(Country $country): void;

    public function updateCountryData(Country $country): void;

    public function deleteCountry(string $countryId): void;

    public function updateCountriesApiData(array $countryList): void;
}