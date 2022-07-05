<?php

declare(strict_types=1);

namespace App\Application\UpdateCountry;

use App\Domain\Bus\Command\CommandHandler;

class UpdateCountryCommandHandler implements CommandHandler
{
    private UpdateCountry $updateCountry;

    public function __construct(
        UpdateCountry $updateCountry
    )
    {
        $this->updateCountry = $updateCountry;
    }

    public function __invoke(UpdateCountryCommand $updateCountryCommand): void
    {
        $countryId = $updateCountryCommand->getCountryId();
        $name = $updateCountryCommand->getName();
        $countryCode = $updateCountryCommand->getCountryCode();
        $capital = $updateCountryCommand->getCapital();
        $population = $updateCountryCommand->getPopulation();

        $this->updateCountry->__invoke(
            $countryId,
            $name,
            $countryCode,
            $capital,
            $population
        );
    }
}