<?php

declare(strict_types=1);

namespace App\Application\ReadCountries;

use App\Domain\Bus\Query\Response;

class ReadCountriesResponse implements Response
{
    private array $countryList;

    public function __construct(
        array $countryList
    )
    {
        $this->countryList = $countryList;
    }

    /**
     * @return array
     */
    public function getCountryList(): array
    {
        return $this->countryList;
    }
}