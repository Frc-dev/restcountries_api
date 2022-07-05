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
        $this->deleteAllCountries = $deleteAllCountries;
    }

    public function __invoke(DeleteAllCountriesCommand $deleteAllCountriesCommand): void
    {
        $this->deleteAllCountries->__invoke();
    }
}