<?php

namespace App\Services\Downloads\Dto;

use Illuminate\Contracts\Support\Arrayable;

final class Location implements Arrayable, \JsonSerializable
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var null|string
     */
    private $street;

    public function __construct($country, $city, $postalCode, $street = null)
    {
        $this->country = $country;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->street = $street;
    }

    public function country()
    {
        return $this->country;
    }

    public function city()
    {
        return $this->city;
    }

    public function postalCode()
    {
        return $this->postalCode;
    }

    public function street()
    {
        return $this->street;
    }

    public function __toString()
    {
        return implode(', ', $this->toArray());
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'street' => $this->street(),
            'postal_code' => $this->postalCode(),
            'city' => $this->city(),
            'country' => $this->country(),
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}