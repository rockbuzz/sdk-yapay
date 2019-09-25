<?php

namespace Rockbuzz\SDKYapay;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Contract\Payment;
use Rockbuzz\SDKYapay\Payment\TransactionBoleto;
use Rockbuzz\SDKYapay\Exception\PaymentException;

class PaymentBoleto extends BasePayment implements Payment
{
    /**
     * @var TransactionBoleto
     */
    protected $transaction;

    public function __construct(
        Config $config, 
        int $methodCode,
        TransactionBoleto $transaction,
        Items $items,
        Billing $billing
    )
    {
        parent::__construct($config, $methodCode, $items, $billing);
        $this->transaction = $transaction;
    }

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

    private function getContents(ClientInterface $client)
    {
        $response = $client->request('POST', $this->config->getEndpoint(), [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'auth' => [
                'username' => $this->config->getUsername(),
                'password' => $this->config->getPassword(),
            ],
            'body' => json_encode([
                'codigoEstabelecimento' => $this->config->getStoreCode(),
                'codigoFormaPagamento' => $this->methodCode,
                'transacao' => $this->transaction,
                'itensDoPedido' => $this->items,
                'dadosCobranca' => $this->billing
            ])
        ]);

        return $response->getBody()->getContents();
    }
}
