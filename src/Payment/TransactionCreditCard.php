<?php

namespace Rockbuzz\SDKYapay\Payment;

use Rockbuzz\SDKYapay\Contract\Transaction;

class TransactionCreditCard extends BaseTransaction implements Transaction
{
    /**
     * @var int
     */
    private $installments;

    public function __construct(
        int $number,
        int $value,
        int $installments
    ) {
        parent::__construct($number, $value);
        $this->installments = $installments;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'numeroTransacao' => $this->number,
            'valor' => $this->value,
            'parcelas' => $this->installments,
            'urlCampainha' => $this->notificationUrl(),
        ];
    }
}
