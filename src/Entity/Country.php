<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="country", indexes={@ORM\Index(name="country_idx",columns={"id"}, options={"length": 255})})
 */
class Country
{
    /** @ORM\Id @ORM\Column(type="string", name="id") */
    private string $id;
    /** @ORM\Column(type="string") */
    private string $name;
    /** @ORM\Column(type="string") */
    private string $countryCode;
    /** @ORM\Column(type="string") */
    private string $capital;
    /** @ORM\Column(type="string") */
    private string $population;

    public function __construct
    (
        $id,
        $name,
        $countryCode,
        $capital,
        $population
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->countryCode = $countryCode;
        $this->capital = $capital;
        $this->population = $population;
    }

    //this is the only place where we must know details about the API, keeping coupling to a minimum
    public static function fromApi(
        array $countryApiData,
        string $countryId
    ): Country
    {
        return new self(
            $countryId,
            $countryApiData['name']['common'],
            $countryApiData['cca2'],
            //some countries are not sovereign and might not have a capital city
            empty($countryApiData['capital'][0])? "No capital" : $countryApiData['capital'][0],
            /*strings are cheaper than integers for storing purposes, converting the int as soon as possible
              lets us work with this string in the entire app*/
            (string)$countryApiData['population']
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getCapital(): string
    {
        return $this->capital;
    }

    /**
     * @return string
     */
    public function getPopulation(): string
    {
        return $this->population;
    }
}