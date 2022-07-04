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

    public function __invoke(CreateCountryQuery $createCountryQuery): void
    {
        $this->createCountry->__invoke();
    }
}