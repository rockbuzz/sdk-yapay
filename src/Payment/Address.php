<?php

namespace Rockbuzz\SDKYapay\Payment;

class Address
{
    const DEFAULT_COUNTRY = 'BR';

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $complement;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $neighborhood;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    public function __construct(
        string $street,
        string $number,
        string $postalCode,
        string $neighborhood,
        string $city,
        string $state,
        string $complement = '',
        string $country = self::DEFAULT_COUNTRY
    )
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->postalCode = $postalCode;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        if (strlen($this->state) != 2) {
            throw new \InvalidArgumentException('state must be two characters');
        }
        return strtoupper($this->state);
    }

    public function getCountry()
    {
        if (strlen($this->country) != 2) {
            throw new \InvalidArgumentException('country must be two characters');
        }
        return strtoupper($this->country);
    }
}
