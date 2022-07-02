<?php

declare(strict_types=1);

namespace App\Application\GetCountriesApi;

use App\Domain\Bus\Query\QueryHandler;

class GetCountriesApiQueryHandler implements QueryHandler
{
    private GetCountriesApi $getCountriesApi;

    public function __construct(
        GetCountriesApi $getCountriesApi
    )
    {
        $this->getCountriesApi = $getCountriesApi;
    }

    public function __invoke(GetCountriesApiQuery $getCountriesApiQuery): array
    {
        return $this->getCountriesApi->__invoke();
    }
}