<?php

namespace Rockbuzz\SDKYapay\Payment;

use Rockbuzz\SDKYapay\Payment\Email;
use Rockbuzz\SDKYapay\Payment\Address;

class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;    

    /**
     * @var string
     */
    private $document;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var Address
     */
    private $address;

    public function __construct(
        int $id, 
        string $name, 
        string $document, 
        Email $email,
        Address $address = null
    )
    {
        $this->id = $id;
        $this->name = $name;        
        $this->document = $document;
        $this->email = $email;
        $this->address = $address;
    }

    public function hasAddress(): bool
    {
        return !! $this->address;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }
 
    public function getName(): string
    {
        return $this->name;
    }

    public function getDocument(): string
    {
        return $this->document;
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    public function getAddressStreet()
    {
        return $this->address->getStreet() ?? null;
    }

    public function getAddressNumber()
    {
        return $this->address->getNumber() ?? null;
    }

    public function getAddressComplement()
    {
        return $this->address->getComplement() ?? null;
    }

    public function getAddressPostalCode()
    {
        return $this->address->getPostalCode() ?? null;
    }

    public function getAddressNeighborhood()
    {
        return $this->address->getNeighborhood() ?? null;
    }

    public function getAddressCity()
    {
        return $this->address->getCity() ?? null;
    }

    public function getAddressState()
    {
        return $this->address->getState() ?? null;
    }

    public function getAddressCountry()
    {
        return $this->address->getCountry() ?? null;
    }
}
