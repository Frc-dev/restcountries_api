<?php

declare(strict_types=1);

namespace App\Application\DeleteAllCountries;

use App\Domain\Bus\Command\CommandHandler;

class DeleteCountryCommandHandler implements CommandHandler
{
    private DeleteCountry $deleteCountry;

    public function __construct(
        DeleteCountry $deleteCountry
    )
    {
        $this->deleteCountry = $deleteCountry;
    }

    public function __invoke(DeleteCountryCommand $deleteCountryCommand): void
    {
        $this->deleteCountry->__invoke();
    }
}