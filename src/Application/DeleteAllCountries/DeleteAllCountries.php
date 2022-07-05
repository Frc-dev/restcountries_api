<?php

declare(strict_types=1);

namespace App\Application\DeleteAllCountries;

use App\Domain\CountryRepository;

class DeleteAllCountries
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
        $this->repository->deleteAllCountries();
    }
}