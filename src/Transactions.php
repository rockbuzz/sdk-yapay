<?php

namespace Rockbuzz\SDKYapay;

use DomainException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Rockbuzz\SDKYapay\Exception\YapayException;
use Rockbuzz\SDKYapay\Contract\Transactions as ITransactions;

class Transactions implements ITransactions
{
    /** @var Config */
    private $config;

    /** @var ClientInterface */
    private $client;

    public function __construct(Config $config, ClientInterface $client = null) 
    {
        $this->config = $config;
        $this->client = $client ?? new Client();
    }

    /** @var DomainException */
    public static function make(array $config, ClientInterface $client = null): self
    {
        return new static(new Config(
            self::getValue('store_code', $config), 
            self::getValue('username', $config), 
            self::getValue('password', $config),
            self::getValue('endpoint', $config)
        ), $client);
    }

    /**
     * @inheritDoc
     */
    public function findByNumber(int $number): Result
    {
        try {
            return new Result($this->getContents($number));
        } catch (\Exception $exception) {
            throw new YapayException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }
    }

    /**
     * @return string
     * @throws GuzzleException
     */
    private function getContents(int $number): string
    {
        $response = $this->client->request('GET', $this->config->getEndpoint() . '/' . $number, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'auth' => [
                $this->config->getUsername(),
                $this->config->getPassword(),
            ]
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * @param string $key
     * @param array $params
     * @throws DomainException
     */
    private static function getValue(string $key, array $params)
    {
        if (array_key_exists($key, $params)) {
            return $params[$key];
        }

        throw new DomainException("Key {$key} is required");
    }
}
