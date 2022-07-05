<?php

declare(strict_types=1);

namespace App\Application\CreateCountry;

use App\Domain\CountryRepository;
use App\Entity\Country;
use Ramsey\Uuid\Uuid;

class CreateCountry
{
    private CountryRepository $repository;

    public function __construct(
        CountryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name, string $countryCode, string $capital, string $population): void
    {
        $country = new Country(
            Uuid::uuid4()->toString(),
            $name,
            $countryCode,
            $capital,
            $population
        );

        $this->repository->insertCountry($country);
    }
}
