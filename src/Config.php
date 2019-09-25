<?php

namespace Rockbuzz\SDKYapay;

class Config
{
    /**
     * @var int
     */
    protected $storeCode;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $endpoint;

    public function __construct(
        int $storeCode, 
        string $username, 
        string $password, 
        string $endpoint
    )
    {
        $this->storeCode = $storeCode;
        $this->username = $username;
        $this->password = $password;
        $this->endpoint = $endpoint;
    }   
    
    public function getStoreCode(): int
    {
        return $this->storeCode;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
