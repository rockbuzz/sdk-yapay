<?php

namespace Rockbuzz\SDKYapay;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Rockbuzz\SDKYapay\Exception\SDKYapayException;
use Rockbuzz\SDKYapay\Contract\Transactions as TransactionsContract;

class Transactions implements TransactionsContract
{

    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?? new Client();
    }

    /**
     * @inheritDoc
     */
    public function findByCode($transactionCode): Result
    {
        try {
            return new Result($this->getContents($transactionCode));
        } catch (\Exception $exception) {
            throw new SDKYapayException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }
    }

    /**
     * @param mixed $transactionCode
     * @return string
     * @throws GuzzleException
     */
    private function getContents($transactionCode): string
    {
        $response = $this->client->request(
            'GET',
            $_ENV['SDK_YAPAY_ENDPOINT'] . '/checkout/api/v3/transacao/'
            . $_ENV['SDK_YAPAY_STORE_CODE'] . '/' . $transactionCode,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'auth' => [
                    $_ENV['SDK_YAPAY_USERNAME'],
                    $_ENV['SDK_YAPAY_PASSWORD'],
                ]
            ]
        );

        return $response->getBody()->getContents();
    }
}
