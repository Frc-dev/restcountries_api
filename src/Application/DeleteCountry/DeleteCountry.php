<?php

declare(strict_types=1);

namespace App\Application\DeleteCountry;

use App\Domain\CountryRepository;
use App\Entity\Country;

class DeleteCountry
{
    private CountryRepository $repository;

    public function __construct(
        CountryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(string $countryId): void
    {
        $this->repository->deleteCountry($countryId);
    }
}