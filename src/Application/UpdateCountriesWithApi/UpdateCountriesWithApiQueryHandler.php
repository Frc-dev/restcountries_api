<?php

declare(strict_types=1);

namespace App\Application\UpdateCountriesWithApi;

use App\Domain\Bus\Query\QueryHandler;

class UpdateCountriesWithApiQueryHandler implements QueryHandler
{
    private UpdateCountriesWithApi $updateCountriesWithApi;

    public function __construct(
        UpdateCountriesWithApi $updateCountriesWithApi
    )
    {
        $this->updateCountriesWithApi = $updateCountriesWithApi;
    }

    public function __invoke(UpdateCountriesWithApiQuery $updateCountriesWithApiQuery): array
    {
        return $this->updateCountriesWithApi->__invoke();
    }
}