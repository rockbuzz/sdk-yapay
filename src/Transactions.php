<?php

namespace Rockbuzz\SDKYapay;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Contract\Payments;
use GuzzleHttp\Exception\GuzzleException;
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

    /**
     * @inheritDoc
     */
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

    /**
     * @param ClientInterface $client
     * @return string
     * @throws GuzzleException
     */
    private function getContents(ClientInterface $client): string
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
