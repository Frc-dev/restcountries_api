<?php

namespace App\Tests\src\Country\Application\UpdateCountriesWithApi;

use App\Application\UpdateCountriesWithApi\UpdateCountriesWithApi;
use App\Application\UpdateCountriesWithApi\UpdateCountriesWithApiQueryHandler;
use App\Tests\src\Country\Domain\CountryMother;
use App\Tests\src\Country\Domain\CountryUnitTestCase;
use App\Tests\src\Country\Domain\GetCountryApiQueryMother;

class UpdateCountriesWithApiQueryHandlerTest extends CountryUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new UpdateCountriesWithApiQueryHandler(
            new UpdateCountriesWithApi(
                $this->apiRequest(),
                $this->repository(),
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