<?php

declare(strict_types=1);

namespace App\Application\DeleteCountry;

use App\Domain\Bus\Command\Command;

class DeleteCountryCommand implements Command
{
    private string $countryId;

    public function __construct(
        string $countryId
    )
    {
        $this->countryId = $countryId;
    }

    public function getCountryId(): string
    {
        return $this->countryId;
    }
}