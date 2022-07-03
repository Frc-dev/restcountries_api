<?php

declare(strict_types=1);

namespace App\Tests\src\Country\Domain;

use App\Entity\Country;
use Ramsey\Uuid\Uuid;

class CountryMother
{
    public static function create(
        string $id,
        string $flag,
        string $name,
        string $countryCode,
        string $capital,
        string $population
    ): Country
    {
        return new Country(
            $id,
            $flag,
            $name,
            $countryCode,
            $capital,
            $population
        );
    }

    public static function fromApi($results, $countryId): Country
    {
        return self::create(
            $countryId,
            $results['flag'],
            $results['name']['common'],
            $results['cca2'],
            $results['capital'][0],
            (string)$results['population'],
        );
    }

    public static function random(): Country
    {
        return self::create(
            Uuid::uuid4()->toString(),
            'ES',
            'España',
            'ES',
            'Madrid',
            '123'
        );
    }
}