<?php

declare(strict_types=1);

namespace App\Application\GetCountriesApi;

use App\ApiRequest;

class GetCountriesApi
{
    private ApiRequest $request;

    public function __construct(
        ApiRequest $request
    )
    {
        $this->request = $request;
    }

    public function __invoke(): array
    {
        $countryList = $this->request->readCountriesApiCall();
        return $countryList;
    }
}
