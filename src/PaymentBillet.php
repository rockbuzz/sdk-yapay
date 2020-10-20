<?php

namespace Rockbuzz\SDKYapay;

use Rockbuzz\StdPayment\Payment;
use GuzzleHttp\{Client, ClientInterface};
use Rockbuzz\StdPayment\StdPaymentException;
use Rockbuzz\SDKYapay\Payment\{Items, Billing};
use Rockbuzz\StdPayment\Result as ResultContract;
use Rockbuzz\SDKYapay\Payment\{ExtraFields, TransactionBillet};

class PaymentBillet extends BasePayment implements Payment
{
    /**
     * @var TransactionBillet
     */
    protected $transaction;
    /**
     * @var ExtraFields
     */
    protected $extraFields;

    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(
        TransactionBillet $transaction,
        Items $items,
        Billing $billing,
        ExtraFields $extraFields = null,
        ClientInterface $client = null
    ) {
        parent::__construct($items, $billing);
        $this->transaction = $transaction;
        $this->extraFields = $extraFields;
        $this->client = $client ?? new Client();
    }

    protected function methodCode(): int
    {
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function done(): ResultContract
    {
        try {
            return new Result($this->getContents());
        } catch (\Exception $exception) {
            throw new StdPaymentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }
    }

    private function getContents(): string
    {
        $response = $this->client->request('POST', $_ENV['SDK_YAPAY_ENDPOINT'] . '/checkout/api/v3/transacao', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'auth' => [
                $_ENV['SDK_YAPAY_USERNAME'],
                $_ENV['SDK_YAPAY_PASSWORD'],
            ],
            'body' => json_encode([
                'codigoEstabelecimento' => $_ENV['SDK_YAPAY_STORE_CODE'],
                'codigoFormaPagamento' => $this->methodCode(),
                'transacao' => $this->transaction,
                'itensDoPedido' => $this->items,
                'dadosCobranca' => $this->billing,
                'camposExtras' => $this->extraFields
            ])
        ]);

        return $response->getBody()->getContents();
    }
}
