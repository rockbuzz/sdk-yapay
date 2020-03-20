<?php

declare(strict_types=1);

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

    /**
     * @return int
     */
    public function getStoreCode(): int
    {
        return $this->storeCode;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        if (!filter_var($this->endpoint, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException(
                'config must have a valid endpoint url'
            );
        }
        return $this->endpoint;
    }
}
