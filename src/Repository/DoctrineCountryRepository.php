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

    public function insertCountry(Country $country): void
    {
        $em = $this->entityManager;
        $em->persist($country);
        $em->flush();
    }

    public function updateCountryData(Country $country): void
    {
        $em = $this->entityManager;
        $oldCountry = $em->getRepository(Country::class)->find($country->getId());

        $this->deleteCountry($oldCountry);
        $this->insertCountry($country);
    }

    public function deleteCountry(string $countryId): void
    {
        $em = $this->entityManager;
        $country = $em->getRepository(Country::class)->find($countryId);
        $em->remove($country);
        $em->flush();
    }

    public function updateCountriesApiData(array $countryList): void
    {
        $this->deleteAllCountries();
        $this->save($countryList);
    }

    public function deleteAllCountries(): void
    {
        $em = $this->entityManager;
        $em->createQuery('DELETE FROM App\Entity\Country c')->execute();
    }
}