<?php

declare(strict_types=1);

namespace App\Application\UpdateCountriesWithApi;

use App\ApiRequest;
use App\Domain\CountryApiMapper;
use App\Domain\CountryRepository;

class UpdateCountriesWithApi
{
    private ApiRequest $request;
    private CountryRepository $repository;
    private CountryApiMapper $mapper;

    public function __construct(
        ApiRequest $request,
        CountryRepository $repository,
        CountryApiMapper $mapper
    )
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    public function __invoke(): array
    {
        $countryList = $this->mapper->__invoke($this->request->readCountriesApiCall());
        $this->repository->updateCountriesApiData($countryList);
        return $this->repository->readAllCountries();
    }
}
