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
    private string $flag;
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
        $flag,
        $name,
        $countryCode,
        $capital,
        $population
    )
    {
        $this->id = $id;
        $this->flag = $flag;
        $this->name = $name;
        $this->countryCode = $countryCode;
        $this->capital = $capital;
        $this->population = $population;
    }

    public static function fromApi(
        array $countryApiData,
        string $countryId
    ): Country
    {
        return new self(
            $countryId,
            $countryApiData['flag']['svg'],
            $countryApiData['name']['common'],
            $countryApiData['cca2'],
            $countryApiData['capital'],
            $countryApiData['population']
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
    public function getFlag(): string
    {
        return $this->flag;
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