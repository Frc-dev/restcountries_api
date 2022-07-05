<?php

declare(strict_types=1);

namespace App\Controller;

use App\Application\CreateCountry\CreateCountryCommand;
use App\Application\DeleteAllCountries\DeleteAllCountriesCommand;
use App\Application\DeleteCountry\DeleteCountryCommand;
use App\Application\UpdateCountriesWithApi\UpdateCountriesWithApiQuery;
use App\Application\UpdateCountry\UpdateCountryCommand;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends ApiController
{
    public function create(string $name, string $countryCode, string $capital, string $population): void
    {
        $this->queryBus->dispatch(new CreateCountryCommand($name, $countryCode, $capital, $population));
    }

    public function updateApi(): Response
    {
        $countryList = $this->queryBus->dispatch(new UpdateCountriesWithApiQuery());
        return $this->apiResponse->handleResponse($countryList);
    }

    public function update(string $countryId, string $name, string $countryCode, string $capital, string $population): void
    {
        $this->queryBus->dispatch(new UpdateCountryCommand($countryId, $name, $countryCode, $capital, $population));
    }

    public function deleteAll(): void
    {
        $this->queryBus->dispatch(new DeleteAllCountriesCommand());
    }

    public function delete(string $countryId): void
    {
        $this->queryBus->dispatch(new DeleteCountryCommand($countryId));
    }
}