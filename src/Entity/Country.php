<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="country", indexes={@ORM\Index(name="country_idx",columns={"country_id"}, options={"length": 255})})
 */
class Country
{
    /** @ORM\Id @ORM\Column(type="string", name="country_id") */
    private string $countryId;
    /** @ORM\Column(type="string") */
    private string $name;

    public function __construct(
        $countryId,
        $name
    )
    {
        $this->countryId = $countryId;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCountryId(): int
    {
        return $this->countryId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}