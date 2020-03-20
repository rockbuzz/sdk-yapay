<?php

namespace Rockbuzz\SDKYapay\Payment;

use InvalidArgumentException;

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
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->document = $document;
        $this->email = $email;
        $this->address = $address;
    }

    /**
     * @return bool
     */
    public function hasAddress(): bool
    {
        return !!$this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getId(): int
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
    public function getDocument(): string
    {
        return $this->document;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    /**
     * @return string|null
     */
    public function getAddressStreet(): ?string
    {
        return $this->address->getStreet() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressNumber(): ?string
    {
        return $this->address->getNumber() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressComplement(): ?string
    {
        return $this->address->getComplement() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressPostalCode(): ?string
    {
        return $this->address->getPostalCode() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressNeighborhood(): ?string
    {
        return $this->address->getNeighborhood() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressCity(): ?string
    {
        return $this->address->getCity() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressState(): ?string
    {
        return $this->address->getState() ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddressCountry(): ?string
    {
        return $this->address->getCountry() ?? null;
    }
}
