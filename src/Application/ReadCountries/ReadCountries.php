<?php

declare(strict_types=1);

namespace App\Application\ReadCountries;

use App\Application\ReadCountries\ReadCountriesResponse;
use App\Domain\CountryRepository;

class ReadCountries
{
    private CountryRepository $repository;

    public function __construct(
        CountryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(): ReadCountriesResponse
    {
        return new ReadCountriesResponse($this->repository->readAllCountries());
    }
}