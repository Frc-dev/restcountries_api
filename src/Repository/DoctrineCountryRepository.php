<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\CountryRepository;
use App\Entity\Country;

class DoctrineCountryRepository extends DoctrineRepository implements CountryRepository
{
    public function save(array $countryList): void
    {
        //batch saving to save memory, results are submitted every flush
        $batchSize = 20;
        $em = $this->entityManager;
        $i = 0;
        foreach ($countryList as $country) {
            $em->persist($country);
            if (($i % $batchSize) === 0) {
                $em->flush();
                $em->clear();
                $i = 0;
            }
            $i++;
        }
        $em->flush();
        $em->clear();
    }

    public function readAllCountries(): array
    {
        return $this->repository(Country::class)->findAll();
    }

    public function insertCountry(): void
    {

    }

    public function updateCountryData(): void
    {

    }

    public function updateCountryDataWithApi($apiData): void
    {

    }

    public function deleteCountry(): void
    {

    }
}