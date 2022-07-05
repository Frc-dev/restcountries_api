<?php

declare(strict_types=1);

namespace App\Application\UpdateCountry;

use App\Domain\Bus\Command\Command;

class UpdateCountryCommand implements Command
{
    private string $countryId;
    private string $name;
    private string $countryCode;
    private string $capital;
    private string $population;

    public function __construct(
        string $countryId,
        string $name,
        string $countryCode,
        string $capital,
        string $population
    )
    {
        $this->countryId = $countryId;
        $this->name = $name;
        $this->countryCode = $countryCode;
        $this->capital = $capital;
        $this->population = $population;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getCapital(): string
    {
        return $this->capital;
    }

    public function getPopulation(): string
    {
        return $this->population;
    }

    public function getCountryId(): string
    {
        return $this->countryId;
    }
}