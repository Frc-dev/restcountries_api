<?php

declare(strict_types=1);

namespace App\Tests\src\Country\Domain;

use App\Application\UpdateCountriesWithApi\UpdateCountriesWithApiQuery;

class GetCountryApiQueryMother
{
    public static function create(): UpdateCountriesWithApiQuery
    {
        return new UpdateCountriesWithApiQuery();
    }
}