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
        string $complement = null,
        string $country = self::DEFAULT_COUNTRY
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->postalCode = $postalCode;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getComplement(): string
    {
        return $this->complement;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        if (strlen($this->state) != 2) {
            throw new \InvalidArgumentException('state must be two characters');
        }
        return strtoupper($this->state);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        if (strlen($this->country) != 2) {
            throw new \InvalidArgumentException('country must be two characters');
        }
        return strtoupper($this->country);
    }
}
