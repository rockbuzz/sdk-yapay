<?php

namespace Rockbuzz\SDKYapay;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Contract\Payment;
use GuzzleHttp\Exception\GuzzleException;
use Rockbuzz\SDKYapay\Payment\CreditCard;
use Rockbuzz\SDKYapay\Exception\YapayException;
use Rockbuzz\SDKYapay\Payment\TransactionCreditCard;

class PaymentCreditCard extends BasePayment implements Payment
{
    /**
     * @var TransactionCreditCard
     */
    protected $transaction;

    /**
     * @var CreditCard
     */
    protected $creditCard;

    public function __construct(
        Config $config,
        int $methodCode,
        TransactionCreditCard $transaction,
        CreditCard $creditCard,
        Items $items,
        Billing $billing
    )
    {
        parent::__construct($config, $methodCode, $items, $billing);
        $this->transaction = $transaction;
        $this->creditCard = $creditCard;
    }

    /**
     * @inheritDoc
     */
    public function done(ClientInterface $client = null): Result
    {
        try {
            return new Result($this->getContents($client ?? new Client()));
        } catch (\Exception $exception) {
            throw new YapayException(
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
                'dadosCartao' => $this->creditCard,
                'itensDoPedido' => $this->items,
                'dadosCobranca' => $this->billing
            ])
        ]);

        return $response->getBody()->getContents();
    }
}
