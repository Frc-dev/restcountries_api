<?php

declare(strict_types=1);

namespace App\Application\DeleteAllCountries;

use App\Domain\Bus\Command\CommandHandler;

class DeleteAllCountriesCommandHandler implements CommandHandler
{
    private DeleteAllCountries $deleteAllCountries;

    public function __construct(
        DeleteAllCountries $deleteAllCountries
    )
    {
        $this->createCountry = $createCountry;
    }

    public function __invoke(CreateCountryQuery $createCountryQuery): void
    {
        $this->createCountry->__invoke();
    }
}