<?php

namespace Rockbuzz\SDKYapay;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Payment\ExtraFields;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Contract\Payment;
use GuzzleHttp\Exception\GuzzleException;
use Rockbuzz\SDKYapay\Payment\TransactionBillet;
use Rockbuzz\SDKYapay\Exception\PaymentException;

class PaymentBillet extends BasePayment implements Payment
{
    /**
     * @var TransactionBillet
     */
    protected $transaction;
    /**
     * @var ExtraFields
     */
    private $extraFields;

    public function __construct(
        Config $config,
        int $methodCode,
        TransactionBillet $transaction,
        Items $items,
        Billing $billing,
        ExtraFields $extraFields = null
    ) {
        parent::__construct($config, $methodCode, $items, $billing);
        $this->transaction = $transaction;
        $this->extraFields = $extraFields;
    }

    /**
     * @inheritDoc
     */
    public function done(ClientInterface $client = null): Result
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
                'codigoFormaPagamento' => $this->methodCode,
                'transacao' => $this->transaction,
                'itensDoPedido' => $this->items,
                'dadosCobranca' => $this->billing,
                'camposExtras' => $this->extraFields
            ])
        ]);

        return $response->getBody()->getContents();
    }
}
