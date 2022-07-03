<?php

declare(strict_types=1);

namespace App\Application\GetCountryApi;

use App\Domain\Bus\Query\QueryHandler;

class GetCountryApiQueryHandler implements QueryHandler
{
    private GetCountryApi $getCountriesApi;

    public function __construct(
        GetCountryApi $getCountriesApi
    )
    {
        $this->getCountriesApi = $getCountriesApi;
    }

    public function __invoke(GetCountryApiQuery $getCountriesApiQuery): array
    {
        return $this->getCountriesApi->__invoke();
    }
}