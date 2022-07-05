<?php

declare(strict_types=1);

namespace App\Application\CreateCountry;

use App\Domain\Bus\Command\Command;

class CreateCountryCommand implements Command
{
    private string $name;
    private string $countryCode;
    private string $capital;
    private string $population;

    public function __construct(
        string $name,
        string $countryCode,
        string $capital,
        string $population
    )
    {
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
}