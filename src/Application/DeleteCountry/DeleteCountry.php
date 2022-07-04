<?php

declare(strict_types=1);

namespace App\Application\GetCountryApi;

class CreateCountry
{
    private CountryRepository $repository;

    public function __construct(
        CountryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(): void
    {
        $deleteCountry = $this->repository->deleteCountry();
    }
}