<?php

declare(strict_types=1);

namespace App\Tests\src\Country\Domain;

use App\ApiRequest;
use App\Domain\CountryApiMapper;
use App\Domain\CountryRepository;
use App\Tests\UnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;

class CountryUnitTestCase extends UnitTestCase
{
    private $repository;
    private $apiRequest;
    private $countryApiMapper;

    /** @return CountryRepository|MockObject */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->mock(CountryRepository::class);
    }

    /** @return ApiRequest|MockObject */
    protected function apiRequest(): MockObject
    {
        return $this->apiRequest = $this->apiRequest ?: $this->mock(ApiRequest::class);
    }

    protected function shouldReturnCountriesApi($result): void
    {
        $this->apiRequest()
            ->expects(self::once())
            ->method('readCountriesApiCall')
            ->willReturn($result);
    }

    /** @return CountryApiMapper|MockObject */
    protected function searchResultMapper(): MockObject
    {
        return $this->countryApiMapper = $this->countryApiMapper ?: $this->mock(CountryApiMapper::class);
    }

    protected function shouldMapCountryApi($resultCollection): void
    {
        $this->searchResultMapper()
            ->expects(self::once())
            ->method('__invoke')
            ->willReturn($resultCollection);
    }
}