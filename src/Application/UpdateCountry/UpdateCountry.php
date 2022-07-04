<?php

declare(strict_types=1);

namespace App\Application\UpdateCountry;

use App\Domain\CountryRepository;

class UpdateCountry
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
        $this->repository->updateCountry();
    }
}