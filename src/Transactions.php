<?php

namespace Rockbuzz\SDKYapay;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Contract\Payments;
use Rockbuzz\SDKYapay\Exception\PaymentException;

class Transactions implements Payments
{
    /**
     * @var Config
     */
    private $config;
    /**
     * @var int
     */
    private $numberTransaction;

    public function __construct(
        Config $config,
        int $numberTransaction
    ) {
        $this->config = $config;
        $this->numberTransaction = $numberTransaction;
    }

    public function findByStoreCodeAndPaymentCode(ClientInterface $client = null): Result
    {
        try {
            return new Result($this->getContents($client ?? new Client()));
        } catch (\Exception $exception) {
            throw new Paymentexception(
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }
    }

    private function getContents(ClientInterface $client)
    {
        $response = $client->request('POST', $this->config->getEndpoint(), [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'auth' => [
                $this->config->getUsername(),
                $this->config->getPassword(),
            ],
            'body' => json_encode([
                'codigoEstabelecimento' => $this->config->getStoreCode(),
                'numeroTransacao' => $this->numberTransaction,
            ])
        ]);

        return $response->getBody()->getContents();
    }
}
