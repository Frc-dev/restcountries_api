<?php

declare(strict_types=1);

namespace App\Tests\src\Country\Infrastructure;

use App\ApiRequest;
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
    public function shouldTestCall()
    {
        $client = $this->apiRequest;
        $results = $client->readCountriesApiCall();
        return $results;
    }
}