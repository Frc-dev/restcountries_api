<?php

declare(strict_types=1);

namespace App\Application\UpdateCountry;

use App\Domain\CountryRepository;
use App\Entity\Country;

class UpdateCountry
{
    private CountryRepository $repository;

    public function __construct(
        CountryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $countryId,
        string $name,
        string $countryCode,
        string $capital,
        string $population
    ): void
    {
        $country = new Country(
            $countryId,
            $name,
            $countryCode,
            $capital,
            $population
        );

        $this->repository->updateCountryData($country);
    }
}