<?php

declare(strict_types=1);

namespace App\Application\CreateCountry;

use App\Domain\Bus\Command\CommandHandler;

class CreateCountryCommandHandler implements CommandHandler
{
    private CreateCountry $createCountry;

    public function __construct(
        CreateCountry $createCountry
    )
    {
        $this->createCountry = $createCountry;
    }

    public function __invoke(CreateCountryCommand $createCountryCommand): void
    {
        $name = $createCountryCommand->getName();
        $countryCode = $createCountryCommand->getCountryCode();
        $capital = $createCountryCommand->getCapital();
        $population = $createCountryCommand->getPopulation();

        $this->createCountry->__invoke($name, $countryCode, $capital, $population);
    }
}