<?php

declare(strict_types=1);

namespace App\Domain;

use App\Entity\Country;
use Ramsey\Uuid\Uuid;
use function Lambdish\Phunctional\map;

class CountryApiMapper
{
    public function __invoke(array $result): array
    {
        $countryId = Uuid::uuid4()->toString();
        $mapper = static function (array $result) use ($countryId) {
            return Country::fromApi($result, $countryId);
        };

        return map($mapper, $result);
    }
}