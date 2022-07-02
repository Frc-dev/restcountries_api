<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiRequest
{
    private HttpClientInterface $client;

    public function __construct(
        HttpClientInterface $client
    )
    {
        $this->client = $client;
    }

    public function readCountriesApiCall(): array
    {
        $url = 'https://restcountries.com/v3.1/all';

        return $this->callApi($url);
    }

    public function callApi(string $url , string $method = 'GET'): array
    {
        try{
            $response = $this->client->request(
                $method,
                $url
            )->getContent();
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                throw new NotFoundHttpException();
            }

            if($e->getCode() === 400) {
                throw new BadRequestHttpException();
            }
        }

        return json_decode($response, true);
    }
}