<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;

class TransactionCreditCard extends BaseTransaction implements JsonSerializable
{
    /**
     * @var int
     */
    private $installments;

    public function __construct(
        int $number,
        int $value,
        int $installments,
        string $notificationUrl
    ) {
        parent::__construct($number, $value, $notificationUrl);
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
            'urlCampainha' => $this->notificationUrl,
        ];
    }
}
