<?php

declare(strict_types=1);

namespace App\Domain;

interface CountryRepository {
    public function save(array $countryCollection): void;
    
    public function readAllCountries(): array;

    public function insertCountry(): void;

    public function updateCountryData(): void;

    public function updateCountryDataWithApi($apiData): void;

    public function deleteCountry(): void;
}