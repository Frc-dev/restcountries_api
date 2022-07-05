<?php

declare(strict_types=1);

namespace App\Application\ReadCountries;

use App\Application\ReadCountries\ReadCountries;
use App\Domain\Bus\Query\QueryHandler;

class ReadCountriesQueryHandler implements QueryHandler
{
    private ReadCountries $readCountries;

    public function __construct(
        ReadCountries $readCountries
    )
    {
        $this->readCountries = $readCountries;
    }

    public function __invoke(ReadCountriesQuery $readCountriesQuery): ReadCountriesResponse
    {
        return $this->readCountries->__invoke();
    }
}