<?php

declare(strict_types=1);

namespace App\Tests\src\Country\Infrastructure;

use App\ApiRequest;
use App\Entity\Country;
use App\Tests\src\Country\Domain\CountryMother;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\NativeHttpClient;

class ApiRequestTest extends WebTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->apiRequest = new ApiRequest(
            new NativeHttpClient()
        );
    }

    /** @test */
    public function should_test_call_and_results_work_properly(): void
    {
        $client = $this->apiRequest;
        $results = $client->readCountriesApiCall();
        $countryId = Uuid::uuid4()->toString();
        $searchResult = CountryMother::fromApi($results[0], $countryId);

        $this->assertInstanceOf(Country::class, $searchResult);
    }
}