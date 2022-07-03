<?php

declare(strict_types=1);

namespace App\Application\GetCountryApi;

use App\ApiRequest;
use App\Domain\CountryApiMapper;

class GetCountryApi
{
    private ApiRequest $request;
    private CountryApiMapper $mapper;

    public function __construct(
        ApiRequest $request,
        CountryApiMapper $mapper
    )
    {
        $this->request = $request;
        $this->mapper = $mapper;
    }

    public function __invoke(): array
    {
        $countryList = $this->request->readCountriesApiCall();
        return $this->mapper->__invoke($countryList);
    }
}