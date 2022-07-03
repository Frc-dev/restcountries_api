<?php

namespace App\Tests\src\Country\Application\GetCountryApi;

use App\Application\GetCountryApi\GetCountryApi;
use App\Application\GetCountryApi\GetCountryApiQueryHandler;
use App\Tests\src\Country\Domain\CountryMother;
use App\Tests\src\Country\Domain\CountryUnitTestCase;
use App\Tests\src\Country\Domain\GetCountryApiQueryMother;

class GetCountryApiQueryHandlerTest extends CountryUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new GetCountryApiQueryHandler(
            new GetCountryApi(
                $this->apiRequest(),
                $this->searchResultMapper()
            )
        );
    }

    /** @test */
    public function should_get_mapped_country_results(): void
    {
        $query = GetCountryApiQueryMother::create();
        $apiResult = ['cosas'];
        $result = [CountryMother::random()];
        $this->shouldReturnCountriesApi($apiResult);
        $this->shouldMapCountryApi($result);

        $this->assertEquals($result, $this->handler->__invoke($query));
    }
}