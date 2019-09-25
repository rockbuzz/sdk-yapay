<?php

namespace Rockbuzz\SDKYapay\Payment;

class Address
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var int
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
        int $number, 
        string $complement, 
        string $postalCode,
        string $neighborhood,
        string $city,
        string $state,
        string $country = 'BR'
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
        return $this->state;
    }
 
    public function getCountry()
    {
        return $this->country;
    }
}
