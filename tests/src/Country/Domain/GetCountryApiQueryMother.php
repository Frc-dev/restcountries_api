<?php

declare(strict_types=1);

namespace App\Tests\src\Country\Domain;

use App\Application\GetCountryApi\GetCountryApiQuery;

class GetCountryApiQueryMother
{
    public static function create(): GetCountryApiQuery
    {
        return new GetCountryApiQuery();
    }
}